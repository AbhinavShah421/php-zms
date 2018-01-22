<?php

session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['role'])) {
	header("Location: dashboard.php");
//	die("Redirecting to dashboard.php");
}

?>
  <link rel='stylesheet' type="text/css" href="custom/css/style.css">
  <link rel='stylesheet' type="text/css" href="assets/css/bootstrap.min.css">
 <div class="container">
        <div class="card card-container">
         
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="process.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="login" type="submit">Login</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->