<?php
    // Lampirkan db dan Admin
    require_once "db.php";
    require_once "Admin.php";

    // Buat object admin
    $admin = new Admin($db);

    // Logout! hapus session admin
    $admin->logout();

    // Redirect ke login
    header('location: login.php');
 ?>
