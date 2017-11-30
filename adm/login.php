<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    // Lampirkan db dan Admin
    require_once "db.php";
    require_once "Admin.php";

    //Buat object admin
    $admin = new Admin($db);

    //Jika sudah login
    if($admin->isLoggedIn()){
        header("location: login.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['send'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Proses login Admin
        if($admin->login($email, $password)){
            header("location: index.php");
        }else{
            // Jika login gagal, ambil pesan error
            $error = $admin->getLastError();
        }
    }
 ?>


<!DOCTYPE HTML>
<html>
<head>
<title>Login Admin - Curhatin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="index.php"><img style="height:50px;"src="../images/curhatin_logo_small.png" alt=""/></a>
  </div>
  <h2 class="form-heading">login Admin</h2>
  <div class="app-cam">
	  <form method="post">
		<input type="text" name="email"class="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}">
		<input type="password" name="password"value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
		<div class="submit"><input type="submit" name="send" onclick="myFunction()" value="Login"></div>

		<ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">New here ?<a href="register.php"> Sign Up</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div>
</body>
</html>
