  
  <?php 
  session_start();
 
  if(empty($_SESSION['user'])&&empty($_SESSION['role'])) {
  	header("Location: index.php");
  	die("Redirecting to index.php");
  }
  $user=$_SESSION['user'];
  $role=$_SESSION['role'];
  
  ?>
  <link rel='stylesheet' type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' type="text/css" href="custom/css/style.css">

  <div class="container">
<!--   main-dash -->
   <div class="row panel panel-body head" >
<!--     dash -->
	   	       
		    <div class="col-sm-3 head-nav1"> Admin panel</div>      
		    <!--      right-dash -->
	         <div class="col-sm-3 head-nav">
		        Dashboard
		    </div>
		    <div class="col-sm-6 head-nav">
		        Welcome:<?php echo" ".$user; ?>
		            <div class="dropdown user-icon">
					 <span class="glyphicon glyphicon-user dropdown-toggle" id="user" data-toggle="dropdown"></span>
					 <ul class="dropdown-menu">
					      <li class="logout"><a href="#" class="logout"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
					    
					    </ul>
<!-- 			         <span class="glyphicon glyphicon-cog user-icon"></span> -->
<!-- 			         <span class="glyphicon glyphicon-envelope user-icon" ></span>		       -->
           </div>
       </div>
   </div>
   <div class="row ">
<!--    left-nav-div -->
      <div class="col-sm-3 panel panel-body head left-nav-div"> 
<!--       navigation bar start   -->
      <?php include('navigation.php'); ?>
      </div>

        <div class="col-sm-9 panel panel-body head main-body" id="main_contant">
    
			    <div class="panel-group row">
			    
			 <div class="col-sm-4">
			    <div class="panel panel-primary info">
			      <div class="panel-heading">Users</div>
			      <div class="panel-body">
			      Managers:<br>
			      Workers:<br>
			      Active:<br>
			      </div>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class="panel panel-success info">
			      <div class="panel-heading">Zoo</div>
			      <div class="panel-body">
			      Capacity:<br>
			      Animals:<br>
			      </div>
			    </div>
			</div>
			<div class="col-sm-4">
			    <div class=" panel panel-info info">
			      <div class="panel-heading">Animals</div>
			      <div class="panel-body">
			      Types:<br>
			      </div>
			    </div>
		    </div>
 
                </div>
                           
                                   <div class="panel panel-warning ">
								      <div class="panel-heading" id="main_heading">Panel with panel-warning class</div>
								      <div class="panel-body dash-contant" id="dash-contant" >Panel Content</div>
								    </div>
								
								  
							
               
</div>
</div>
</div>

<?php 

?>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="custom/js/function.js"></script>
