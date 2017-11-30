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


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="login-page">
          <div class="form">
            <?php echo $admin->isLoggedIn(); ?>
            <form class="login-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <input type="email" name="email" placeholder="email" required/>
              <input type="password" name="password" placeholder="password" required/>
              <button type="submit" name="send">login</button>
              <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            </form>
          </div>
        </div>
    </body>
</html>
