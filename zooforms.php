<?php
include("connection.php");
$con=connect_db();
if(isset($_POST['add_zoo'])){
	echo'
 	<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
	<div class="col-lg-5 well">
	               <div class="row">
				      <form>					
							<div class="row" form-group">
                            <div class="col-sm-12">			
							<input type="text" placeholder="Name.." id="zoo_name" name="name" class="form-control">
									
							<textarea placeholder="Address.." rows="3" id="zoo_address" name="address" class="form-control"></textarea>
							</div>
                            </div>
                         	
						 <button type="button" class="btn btn-sm btn-success" id="addzoosubmit" name="addzoosubmit">Submit</button>
				         			
			         </form>
	                    
					</div>		
				</div>
                      
			</div>
		</div>
    </div>
	';
	
}

 if(isset($_POST['manage_zoo'])){
 	echo'
 	<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
	<div class="col-lg-5 well">
	               <div class="row">
				      <form>
							<div class="row" form-group">
                            <div class="col-sm-8">
                            <label>Select zoo:</label>
							<select placeholder="select Zoo" id="selectedzoo" name="selectedzoo" class="form-control" >
                            
                            </select>   			
							</div>
                             <div class="col-sm-8">
                            <label>Select Manager:</label>
							<select placeholder="Select Manager" id="selectedmanager" name="selectedmanager" class="form-control">
                           
                            </select>			
							</div>
                            </div>
 			             
						 <button type="button" class="btn btn-sm btn-info" id="managezoosubmit" name="managezoosubmit">Submit</button>
 			
			         </form>
 			
					</div>
				</div>
 			
			</div>
		</div>
    </div>
	';	
}

if(isset($_POST['zoo_options'])){
	
	$sql="select * from zoo_master";
	$res=$con->query($sql);
	echo" <option value='' disabled selected>Select Zoo</option>";
	if($res){
		while($row=$res->fetch_object()){
					
					echo"<option name=".$row->id.">".$row->name."</option>";
				}
	}

	
}

if(isset($_POST['manager_options'])){
	$sql="select * from user_master where `role`='manager' or `role`='admin' ";
	$res=$con->query($sql);
	echo'<option value="" disabled selected>Select Manager</option>';
	if($res){
		while($row=$res->fetch_object()){
			
			echo"<option name=".$row->id.">".$row->fname." ".$row->lname."</option>";
		}
	}
	
}


if(isset($_GET['search'])){
	// 	print_r("hello");
	// 	die;
	$search    = $_GET['search'];
	$sql  = "SELECT * FROM zoo_master WHERE name like '$search%' ORDER BY name";
	$res        = $con->query($sql);
	if(!$res)
		echo mysqli_error($con);
		else
			while( $row = $res->fetch_object() )
			{
				$name=$row->name;
				echo "<option id='".$row->id."' class='selectedzooid' value='".$name."' data-id='".$row->id."'></option>";
			}
}


if(isset($_POST['viewzoo'])){
	
	$sql="select * from zoo_master where `id`='".$_POST['viewzoo']."'";
	$query=$con->query($sql);
	if(!$query){
		echo mysqli_error($con);
	}
	else{
		while($row=$query->fetch_object()){
			echo'
			<div class="panel panel-warning form-panel" >
		    <div class="panel-heading" id="main_heading"></div>
		    <div class="panel-body" >
			<div class="col-lg-5 well">
                      <div class="alert alert-success alert-normal-success hidden">
				      				<button type="button" class="close">×</button>
				  	        	    I am a normal success message. To close use  the appropriate button.
								</div>
                                 	<div class="alert alert-danger alert-normal-danger hidden" >
					  				    <button type="button" class="close">×</button>
					  					I am a normal danger message. To close use  the appropriate button.
									</div>
			        <div class="row">
				      <form id="modifyzoo">					
							<div class="row" form-group">
                            <div class="col-sm-12">	
                                <input type="text" name="zooid" value="'.$row->id.'" hidden>
                             Name:<br>		
							<input type="text" placeholder="Name.." id="zoo_name" name="name" class="form-control" value="'.$row->name.'" required>
						    Address:<br>			
							<textarea placeholder="Address.." rows="3" id="zoo_address" name="address" class="form-control" required>'.$row->address.'</textarea>
							</div>
                            </div>
                         	
						 <button type="button" class="btn btn-sm btn-info" id="modifyzoosubmit" name="modifyzoosubmit">Update</button>
				         			
			         </form>
	                    
					</div>		
				</div>
                      
			</div>
		</div>
    </div>							
	';
		}
	}
}

if(isset($_POST['zoodata'])){
	echo'
 <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>           
              <th>Manager ID</th>
              <th>Manager Name</th>			
            </tr>
          </thead>
          <tbody id="myTable">';
	 
	
	$sql="SELECT user_master.id as managerid,user_master.fname as fname,
         user_master.lname as lname, zoo_master.id as zooid,zoo_master.name as zooname,zoo_master.address FROM emp_zoo_master INNER JOIN user_master ON 
         emp_zoo_master.empid = user_master.id INNER JOIN zoo_master ON emp_zoo_master.zooid = zoo_master.id ";
	$res=mysqli_query($con, $sql);
	if($res){
		while($row=$res->fetch_object()){
			echo'
            <tr>
              <td>'.$row->zooid.'</td>
              <td>'.$row->zooname.'</td>
              <td>'.$row->address.'</td>
              <td>'.$row->managerid.'</td>
              <td>'.$row->fname.' '.$row->lname.'</td>           
            
            </tr>';
		}
	}
	echo' </tbody>
        </table>
      </div>
      <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
';
	
	
	
}
?>