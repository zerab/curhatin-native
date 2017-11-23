<?php
    // Lampirkan db dan Admin
    require_once "db.php";
    require_once "Admin.php";

    // Buat object user
    $admin = new Admin($db);

    // Jika sudah login
    if($admin->isLoggedIn()){
        header("location: index.php"); //Redirect ke index
    }

    //Jika ada data dikirim
    if(isset($_POST['send'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        // Registrasi admin baru
        if($admin->register($firstname, $lastname, $email, $password, $gender, $phone)){
            // Jika berhasil set variable success ke true
            $success = true;
        }else{
            // Jika gagal, ambil pesan error
            $error = $admin->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="login-page">
          <div class="form">
              <form class="register-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <?php if (isset($success)): ?>
                  <div class="success">
                      Berhasil mendaftar. Silakan <a href="login.php">masuk</a>
                  </div>
              <?php endif; ?>

               <input type="text" name="firstname" placeholder="nama depan" required/>
               <input type="text" name="lastname" placeholder="nama belakang" required/>
               <input type="email" name="email" placeholder="email address" required/>
               <input type="text" name="phone" placeholder="Nomor Telepon">
               <select class="form_select" name="gender">
                 <option selected>Gender</option>
                 <option value="m">Laki-laki</option>
                 <option value="f">Perempuan</option>
               </select>
               <input type="password" name="password" placeholder="password" required/>
               <button type="submit" name="send">create</button>
               <p class="message">Already registered? <a href="login.php">Sign In</a></p>
             </form>
          </div>
        </div>
    </body>
</html>
