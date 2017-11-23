<?php

    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    if(!$user->isLoggedIn()){
        header("location: landing.php");
    }

    $currentUser = $user->getUser();

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="includes/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="includes/style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
    <div class="logo-sign-container">
      <div class="logo-sign">
          <center><img src="images/curhatin_logo_small.png"></center>
      </div>
    </div>
            <div id="leftSidenav" class="sidenav">
              <div class="leftsideContent">
                <div class="profileBubble">
                  <center><img src="images/7cf.jpg" class="photo-round"></center>
                </div>

                <div class="sideMenu">

                    <a style="cursor:pointer;" onclick="javascript: sendRequest('home.php', '', 'content', 'div', '');"><i class="fa fa-home fa-1x"></i>&nbsp;&nbsp;&nbsp;Home</a>
                    <a style="cursor:pointer;" onclick="javascript: sendRequest('home.php', '', 'content', 'div', '');"><i class="fa fa-user fa-1x"></i>&nbsp;&nbsp;&nbsp;My Account</a>
                    <a style="cursor:pointer;" onclick="javascript: sendRequest('home.php', '', 'content', 'div', '');"><i class="fa fa-home fa-1x"></i>&nbsp;&nbsp;&nbsp;Match Up</a>

                </div>

              <a href="logout.php"><button type="button">Logout</button></a>
              </div>
            </div>
            <div id="mainSection" class="section">

            </div>

    </body>
</html>
