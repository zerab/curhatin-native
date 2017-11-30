<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

    if(!$admin->isLoggedIn()){
        header("location: login.php");
    }

    $currentAdmin = $admin->getAdmin();

    $query = $db->prepare("SELECT * FROM users");
    $query->execute();
    $data = $query->fetchAll();

    if(isset($_POST['send'])){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $phone = $_POST['phone'];

      if($user->register($firstname, $lastname, $email, $password, $gender, $phone)){
          // Jika berhasil set variable success ke true
          $success = true;
      }else{
          // Jika gagal, ambil pesan error
          $error = $user->getLastError();
      }
    }
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - Curhatin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php"><img style="height:50px;padding:5px; background-color: white;" src="images/curhatin_logo_small.png"</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Messages</strong>
							<div class="progress thin">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
							    <span class="sr-only">40% Complete (success)</span>
							  </div>
							</div>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/2.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/3.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/4.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/5.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/pic1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="dropdown-menu-footer text-center">
							<a href="#">View all messages</a>
						</li>
	        		</ul>
	      		</li>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span class="label label-info">42</span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i> Messages <span class="label label-success">42</span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span class="label label-danger">42</span></a></li>
						<li><a href="#"><i class="fa fa-comments"></i> Comments <span class="label label-warning">42</span></a></li>
						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span class="label label-default">42</span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span class="label label-primary">42</span></a></li>
						<li class="divider"></li>
						<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="management/user.php"><i class="fa fa-users fa-fw nav_icon"></i>User Management</a>
                        </li>

                            </ul>
                            <!-- /.nav-second-level -->

                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
          <h3>&nbsp;&nbsp;Enter Data</h3>
          <form class="form-horizontal" method="post">
            <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="firstname" placeholder="First Name">
									</div>
            </div>
            <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-8">
										<input type="text" class="form-control1" name="lastname" placeholder="Last Name">
									</div>
            </div>
            <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-8">
										<input type="email" class="form-control1" name="email" placeholder="Email">
									</div>
            </div>
            <div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" name="password" placeholder="Password">
									</div>
						</div>
            <div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-8">
										<div class="checkbox-inline"><label><input type="checkbox" name="gender" value="m">Male</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" name="gender" value="f">Female</label></div>
                  </div>
          </div>
          <div class="form-group">
                <label for="phoneNumber" class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control1" name="phone" placeholder="Phone Number">
                </div>
          </div>
          <div class="form-group">
            <label for="phoneNumber" class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
              <input type="submit" class="form-control1" name="send">
            </div>
          </div>
          </form>

          <table class="table">
            <tr>
            <thead>
              <th class="active">ID</th>
              <th class="active">First Name</th>
              <th class="active">Last Name</th>
              <th class="active">Email</th>
              <th class="active">Gender</th>
              <th class="active">Phone Number</th>
            </thead>
            </tr>

            <?php foreach($data as $value): ?>
            <tr>
              <td><?php echo $value['id_user'];?></td>
              <td><?php echo $value['firstname'];?></td>
              <td><?php echo $value['lastname'];?></td>
              <td><?php echo $value['email'];?></td>
              <td><?php echo $value['gender'];?></td>
              <td><?php echo $value['phone'];?></td>
            </tr>
          <?php endforeach; ?>
          </table>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
