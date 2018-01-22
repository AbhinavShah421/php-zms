<?php
include("connection.php");
$con=connect_db();
if(isset($_POST['addanimal'])){
	echo'<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
	<div class="col-lg-5 well">
	<div class="row">
				<form id="animalform">			
						<div class="col-sm-12 ">
                               <div class="form-group">								
								<input type="text" placeholder="Name.." id="animalname" name="animalname" class="form-control">
								</div>			
                      			<div class="form-group">				
								<select id="selecttype" name="selectedtype" class="form-control"> 
                                <option disable select>select type..</option>                                                  
                                </select>  
								</div>			
                      			<div class="form-group">			
								<input type="text" id="age" placeholder="Age.." name="age" class="form-control">
								</div>			
                      			<div class="form-group">		
								<input type="text" id="diet" placeholder="Diet.." name="diet" class="form-control">
							    </div>	 
 								<div class="form-group">				
								<select id="zooselect" name="selectedzoo" class="form-control">  
                                <option disable select>select zoo..</option>                                  
                                </select>  
								</div>	                     									
						</div>
										
					 <button type="button" class="btn btn-sm btn-success" id="addanimalsubmit" name="addanimalsubmit">Submit</button>										
					</form> 
                   </div>			
               
				</div>
			</div>
		</div>
    </div>';
}
if(isset($_POST['animaltype'])){
	$sql="select * from animal_type";
	echo"";
	$res=$con->query($sql);
	while($row=$res->fetch_object()){
		echo"<option name=".$row->id.">".$row->type."</option>";
	}
}
if(isset($_POST['zooselect'])){
	
	$sql="select id, name from zoo_master ";
	echo"";
	$res=$con->query($sql);
	while($row=$res->fetch_object()){
		echo"<option name=".$row->id.">".$row->name."</option>";
	}
}
if(isset($_GET['searchanimal'])){
	$search    = $_GET['searchanimal'];
	$sql  = "SELECT * FROM animal_master WHERE name like '$search%' ORDER BY name";
	$res        = $con->query($sql);
	if(!$res)
		echo mysqli_error($con);
		else
			while( $row = $res->fetch_object() )
			{
				$name=$row->name;
				echo "<option id='".$row->id."' value='".$name." ".$row->id."' data-id='".$row->id."'></option>";
			}
}
if(isset($_POST['listanimals'])){
	$sql="select * from animal_master where `id`='".$_POST['listanimals']."'";
	$query=$con->query($sql);
	while($row=$query->fetch_object()){
	?>
	<div class="panel panel-warning form-panel" >
    <div class="panel-heading" id="main_heading"></div>
    <div class="panel-body" >
	<div class="col-lg-5 well">
	<div class="row">
				<form id="updateanimalform">
						<div class="col-sm-12 ">
                               <div class="form-group">
                                <input type="text" id="updateid" name="id" value='<?=$row->id?>' hidden>
 								Name:
								<input type="text" placeholder="Name.." id="animalname" name="updatedanimalname" class="form-control" value='<?=$row->name?>'>
								</div>
                      			<div class="form-group">
                                Type:
                               <?php 
                               	$sql2="select id,type from animal_type where id=$row->type ";
	                            $res1=$con->query($sql2);
	                            while($row2=$res1->fetch_object()){	 
								?>
								<select id="selecttype" name="selectedtype" class="form-control">
								<option name='<?=$row2->id?>' selected><?=$row2->type?></option>
                                </select>
	                            <?php }
                                ?>
								</div>
                      			<div class="form-group">
                                Age:
								<input type="text" id="age" placeholder="Age.." name="age" class="form-control" value='<?=$row->age?>'>
								</div>
                      			<div class="form-group">
								Diet:
                                <input type="text" id="diet" placeholder="Diet.." name="diet" class="form-control" value='<?=$row->diet?>'>
							    </div>
 								<div class="form-group">
                                  Zoo Name:
	                            <?php $sql1="select id,name from zoo_master where id=$row->zooid ";                       
	                            $res=$con->query($sql1);	                           
	                            while($row1=$res->fetch_object()){	                            
	                            ?>
	                            <select id="zooselect" name="selectedzoo" class="form-control" >
 									  <option name='<?=$row1->id?>' selected><?=$row1->name?></option>
                                      </select>
	                          <?php   }}?>
								</div>
						</div>
			
					 <button type="button" class="btn btn-sm btn-info" id="modifyanimalsubmit" name="modifyanimalsubmit">Update</button>
					</form>
                   </div>
			
				</div>
			</div>
		</div>
    
  <?php }?>
  
 <?php if(isset($_POST['list_animals'])){
  
 	?> 

 <div class="table-responsive">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>              
              <th>Type</th>
              <th>Age</th>
              <th>Zoo ID</th>
              <th>Zoo Name</th>
            </tr>
          </thead>
          <tbody id="myTable">
	<?php $sql="SELECT animal_master.*, zoo_master.id as zooid,zoo_master.name as zooname,
 animal_type.type as typename FROM zoo_master INNER JOIN animal_master ON zoo_master.id = animal_master.zooid 
INNER JOIN animal_type ON animal_master.type = animal_type.id";
 	$res=$con->query($sql);
 	while($row=$res->fetch_object()){
 	     
 		?>
	
		
            <tr>
              <td><?= $row->id?></td>
              <td><?= $row->name?></td>             
              <td><?= $row->typename ?></td>
              <td><?= $row->age ?></td>
              <td><?= $row->zooid?></td>
              <td><?= $row->zooname?></td>
              <td id="move">
              <button id="transfer" data="<?= $row->id?>" class=" btn-xs btn-success transfer"  data-toggle="modal" data-target="#myModal">Move</button></td>
             <td><span class="deleteanimal" id='<?= $row->id?>'><i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i><span></td>  
            </tr>
<?php }	
		?>		
         </tbody>
       </table>
      </div>
    
      
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body">
         
                               <div class="form-group">
                                  Zoo Name:	                            
	                            <select id="zooselect" name="selectedzoo" class="form-control" >
 									<option disabled>Choose Zoo..</option>
                                      </select>	                          
								</div>
								<button type="button" class="transferTo btn-success btn-sm" >Move</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      </div>
      
    </div>
  </div>
   <?php }?>    

<?php if(isset($_POST['transferanimal'])){
	$sql = "UPDATE `animal_master` SET `zooid`='".$_POST['transferanimal']."' WHERE id= '".$_POST['id']."' ";
	$res=mysqli_query($con,$sql);
	if($res){
		print_r("record updated.................... ");
		die;
	}
	
}?>	
		
	

