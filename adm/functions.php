<?php
function addUser($firstname, $lastname, $email, $password, $gender, $phone)
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
?>
