<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

    if(!$admin->isLoggedIn()){
        header("location: login.php");
    }

    $currentAdmin = $admin->getAdmin();

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="info">
                <h1>Selamat datang <?php echo $currentAdmin["firstname"]; ?></h1>
            </div>
            <a href="logout.php"><button type="button">Logout</button></a>

        </div>
    </body>
</html>
