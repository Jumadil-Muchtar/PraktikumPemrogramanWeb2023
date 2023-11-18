<?php

require_once('../config/base.php');
require_once('../config/connection.php');

$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$konfirpass = $_POST['konfirpass'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Kondisi untuk register
if (empty($email) || empty($namalengkap) || empty($username) || empty($password) || empty($konfirpass)) {
   header("location: " . BASE_URL . 'regisadm.php?process=failedempty');
}  else {
   if ($password != $konfirpass) {
      header("location: " . BASE_URL . 'regisadm.php?process=failedpassword');
   } else {
      $query = mysqli_query($connection, "SELECT * FROM akunadmin WHERE username = '$username'");
      if (mysqli_num_rows($query) != 0) {
         header("location: " . BASE_URL . 'regisadm.php?process=failedusername');
      } else {
         mysqli_query($connection, 
         "INSERT INTO akunadmin (email, namalengkap, username, password) 
         VALUES ('$email', '$namalengkap', '$username', '$hashedPassword')");
         header("location: " . BASE_URL . 'login.php?process=successregister');
      }
   }
}
?>
