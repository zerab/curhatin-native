<?php

    class User
    {

        private $db;
        private $error;

        function __construct($db_conn)
        {
            $this->db = $db_conn;
            session_start();
        }

        public function register($firstname, $lastname, $email, $password, $gender, $phone)
        {
            try
            {
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password, gender, phone) VALUES (:firstname, :lastname, :email, :password, :gender, :phone)");
                $query->bindParam(":firstname", $firstname);
                $query->bindParam(":lastname", $lastname);
                $query->bindParam(":email", $email);
                $query->bindParam(":password", $hashPassword);
                $query->bindParam(":gender", $gender);
                $query->bindParam(":phone", $phone);

                $query->execute();

                return true;
            } catch (PDOException $e) {
                if ($e->errorInfo[0] == 23000) {
                  $this->error = "Email sudah digunakan!";
                  return false;
                } else {
                  echo $e->getMessage();
                  return false;
                }
            }
        }

        public function login($email, $password)
        {
            try {
                $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();

                if($query->rowCount() > 0){
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['user_session'] = $data['id_user'];
                        return true;
                    } else {
                        $this->error = "Email atau Password Anda Salah";
                        return false;
                    }
                } else {
                    $this->error = "Email atau Password Anda Salah";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function isLoggedIn(){
            if (isset($_SESSION['user_session'])) {
              return true;
            }
        }

        public function getUser(){
            if (!$this->isLoggedIn()) {
              return false;
            }
            try {
                $query =  $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
                $query->bindParam(":id", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function logout(){
            session_destroy();
            unset($session['user_session']);
            return true;
        }

        public function getLastError(){
            return $this->error;
        }
    }

?>
