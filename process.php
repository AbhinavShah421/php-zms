<?php
include("connection.php");
$con=connect_db();
if(isset($_POST['login'])){	
	$loginid = $_POST['email'];
	$password = $_POST['password'];
    $query=mysqli_query($con,"select * from user_master where `email`='".$loginid."' and `password`='".$password."' ")	;
    session_start();
		if($query){
// 			echo"login successfull...............";          
          while($row = $query->fetch_assoc()) {           
           $_SESSION['user']=$row['fname']." ".$row['lname'];
           $_SESSION['role']=$row['role'];  
         
           
          } 
        
           header("location:dashboard.php");
		}
		else{
			echo"something went wrong";
		}
}

if(isset($_POST['name'])){	
echo'
 	<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
	<div class="col-lg-12 well">
	<div class="row">
				<form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								
								<input type="text" placeholder="First Name.." id="fname" name="fname" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								
								<input type="text" placeholder="Last Name.." id="lname" name="lname" class="form-control">
							</div>
						</div>					
						<div class="form-group textarea">
	
							<textarea placeholder="Address.." rows="3" id="address" name="address" class="form-control"></textarea>
						</div>
                        <div class="col-sm-4 form-group">
								
								<input type="text" placeholder="Zip Code.." id="zipcode" name="zipcode" class="form-control">
							</div>			
						<div class="row">
							<div class="col-md-6 form-group">
								
								<input type="text" placeholder="Role.." id="role" name="role" class="form-control">
							</div>	
							<div class="col-md-6 form-group">
								
								<input type="text" placeholder="Phone No.." id="phoneno" name="phoneno" class="form-control">
							</div>	
							
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								
								<input type="text" placeholder="Email.." id="email" name="email" class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								
								<input type="password" placeholder="Password.." id="password" name="password" class="form-control">
							</div>	
						</div>	</form> 					
					 <button type="button" class="btn btn-sm btn-success" id="addusersubmit" name="addusersubmit">Submit</button>
										
					</div>
				
               
				</div>
			</div>
		</div>
    </div>
	';
}


if(isset($_POST['addusersubmit'])){	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$role=$_POST['role'];
	$phoneno=$_POST['phoneno'];
	
	$query= mysqli_query($con,"INSERT INTO user_master (fname,lname,email,address,zipcode,role,phoneno,password,status)
			VALUES ('$fname','$lname','$email','$address','$zipcode','$role','$phoneno','$password',1)");
	if($query){
		echo"record submitted";
	}
	else{
		echo'errorr........................';
	}
}


if(isset($_GET['search'])){
// 	print_r("hello");
// 	die;
	$search    = $_GET['search'];
	$sql  = "SELECT id, fname, lname FROM user_master WHERE fname like '$search%' ORDER BY fname";
	$res        = $con->query($sql);
	if(!$res)
		echo mysqli_error($con);
		else
			while( $row = $res->fetch_object() )
			{
				$name=$row->fname.' '.$row->lname;
				echo "<option id='".$row->id."' class='selectedid' value='".$name."' data-id='".$row->id."'></option>";
             }		
}
// ...............code for modify user details...........................................

	

if(isset($_POST['modify'])){
	
	$sql="select * from user_master where `id`='".$_POST['modify']."'";
    $query=$con->query($sql);
    if(!$query){
    echo mysqli_error($con);
    }
    else{
	while($row=$query->fetch_object()){
	echo'<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
 
                             
								<div class="alert alert-success alert-normal-success hidden">
				      				<button type="button" class="close">×</button>
				  	        	    I am a normal success message. To close use  the appropriate button.
								</div>
                                 	<div class="alert alert-danger alert-normal-danger hidden" >
					  				    <button type="button" class="close">×</button>
					  					I am a normal danger message. To close use  the appropriate button.
									</div>

	<div class="col-lg-12 well">
	<div class="row">
				<form id="modifyuser">
					<div class="col-sm-12">
						<div class="row">                       
                            	
				           <input type="text" placeholder="User Id.." id="userid" name="userid" value="'.$row->id.'" class="form-control" hidden >
							
							<div class="col-sm-6 form-group">
			                    First Name :
								<input type="text" placeholder="First Name.." id="fname" name="fname" value="'.$row->fname.'" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
			                    Last Name :
								<input type="text" placeholder="Last Name.." id="lname" name="lname" value="'.$row->lname.'" class="form-control">
							</div>
						</div>
						<div class="form-group textarea">
			                Address :
							<textarea placeholder="Address.." rows="3" id="address" name="address"  class="form-control">'.$row->address.'</textarea>
						</div>
                        <div class="col-sm-3 form-group">
			                    Zipcode :
								<input type="text" placeholder="Zip Code.." id="zipcode" name="zipcode" value="'.$row->zipcode.'" class="form-control">
							</div>
						<div class="row">
							<div class="col-md-4 form-group">
			                     Role :
								<input type="text" placeholder="Role.." id="role" name="role" value="'.$row->role.'" class="form-control">
							</div>
                            <div class="col-md-4 form-group">
			                     Status :
								<input type="text" placeholder="status.." id="status" name="status" value="'.$row->status.'" class="form-control">
							</div>
							<div class="col-md-4 form-group">
			                     Phone No :
								<input type="text" placeholder="Phone No.." id="phoneno" name="phoneno" value="'.$row->phoneno.'" class="form-control">
							</div>
			
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
			                    Email :
								<input type="text" placeholder="Email.." id="email" name="email" value="'.$row->email.'" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
			                     Password :
								<input type="password" placeholder="Password.." id="password" name="password" value="'.$row->password.'" class="form-control">
							</div>
						</div>	
  						 </form>
					 <button type="button" class="btn btn-sm btn-info" id="modifyusersubmit" name="modifyusersubmit">Update</button>
			       
					</div>
			       </div>
			      </div>
				</div>
	</div>
    
	';
 }
}
}



if(isset($_POST['list_user'])){
	echo'
 <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>              
              <th>Address</th>
              <th>Zipcode</th>
              <th>Email</th>
              <th>Phone No</th>
			  <th>Role</th>
            </tr>
          </thead>
          <tbody id="myTable">';
	
	$sql="SELECT * from user_master";
	$res=mysqli_query($con, $sql);
	if($res){
	while($row=$res->fetch_object()){
		echo'
            <tr>
              <td>'.$row->id.'</td>
              <td>'.$row->fname.' '.$row->lname.'</td>             
              <td>'.$row->address.'</td>
              <td>'.$row->zipcode.'</td>
              <td>'.$row->email.'</td>
              <td>'.$row->phoneno.'</td>
              <td>'.$row->role.'</td>
              <td><span class="deteteuser" id='.$row->id.'><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i><span></td>
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

