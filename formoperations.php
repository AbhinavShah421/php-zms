<?php
include("connection.php");
$con=connect_db();
if(isset($_POST['fname'])){
	
	
	$sql = "UPDATE `user_master` SET `fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."', 
           `address`='".$_POST['address']."', `role`='".$_POST['role']."', `zipcode`='".$_POST['zipcode']."',`phoneno`='".$_POST['phoneno']."',
            `email`='".$_POST['email']."', `password`='".$_POST['password']."', `status`='".$_POST['status']."' WHERE id= '".$_POST['userid']."' ";
		//print_r($sql);die;
	$res=mysqli_query($con,$sql);
	if($res){
// 		print_r("record updated.................... ");
// 		die;
	}
}
//................................................................
if(isset($_POST['addzoosubmit'])){
	$name=$_POST['name'];
	$address=$_POST['address'];
	$query= mysqli_query($con,"INSERT INTO zoo_master (name,address)
			VALUES ('$name','$address')");
	if($query){
		echo"record submitted";
	}
	else{
		echo'errorr........................';
	}
	
}
//.................................................................
if(isset($_POST['name'])){
	
	
	$sql = "UPDATE `zoo_master` SET `name`='".$_POST['name']."',`address`='".$_POST['address']."' WHERE id= '".$_POST['zooid']."' ";
	//print_r($sql);die;
	$res=mysqli_query($con,$sql);
	if($res){
		print_r("record updated.................... ");
		die;
	}
}
// manage zoo....................................................
if(isset($_POST['selectedzooid'])){
	$empid=$_POST['selectedmanagerid'];
	$zooid=$_POST['selectedzooid'];
	$sql="insert into emp_zoo_master(`empid`,`zooid`) values('".$empid."','".$zooid."')";
	$res=$con->query($sql);
	
}
//delete user........................................................
if(isset($_POST['deteteid'])){
	$deleteid=$_POST['deteteid'];
	$sql="DELETE FROM user_master WHERE `id` = '$deleteid'";
	mysqli_query($con,$sql);
}
//adding animals..............................................................

if(isset($_POST['animalname'])){
	
	$name=$_POST['animalname'];
	$type=$_POST['type'];
	$age=$_POST['age'];
	$diet=$_POST['diet'];
	$zooid=$_POST['zooid'];
	$query= mysqli_query($con,"INSERT INTO animal_master (name,type,age,diet,zooid)
			VALUES ('$name','$type','$age','$diet','$zooid')");
	if($query){
		
	}
	else{
		echo'errorr........................';
	}
	
}
//...................updating animals..........................

if(isset($_POST['updatedanimalname'])){	
	$sql = "UPDATE `animal_master` SET `name`='".$_POST['updatedanimalname']."',`type`='".$_POST['selectedtype']."',`age`='".$_POST['age']."'
,`diet`='".$_POST['diet']."',`zooid`='".$_POST['selectedzoo']."' WHERE id= '".$_POST['id']."' ";
	$res=mysqli_query($con,$sql);
	if($res){
		print_r("record updated.................... ");
		die;
	}
}

if(isset($_POST['deleteanimal'])){
	$deleteid=$_POST['deleteanimal'];
	$sql="DELETE FROM animal_master WHERE `id` = '$deleteid'";
	mysqli_query($con,$sql);
}

if(isset($_POST['logout'])){	
 	session_start();
	session_destroy();
	//if(!isset($_SESSION)){
	echo"logouted";
	die;	
	//}
}
?>