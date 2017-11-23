<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    //Buat object user
    $user = new User($db);

    //Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['send'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Proses login user
        if($user->login($email, $password)){
            header("location: index.php");
        }else{
            // Jika login gagal, ambil pesan error
            $error = $user->getLastError();
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
            <?php echo $user->isLoggedIn(); ?>
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
