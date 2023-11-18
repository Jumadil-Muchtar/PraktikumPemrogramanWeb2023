<?php

require_once('../config/base.php');
require_once('../config/connection.php');

$nim = $_POST['nim'];
$namalengkap = $_POST['namalengkap'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
$username = $_POST['username'];
$password = $_POST['password'];
$konfirpass = $_POST['konfirpass'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Kondisi untuk register
// data yg diisi saat registrasi tdk boleh ada yg kosong
// $password harus = $konfirpass
// username unique -> tdk ada yg sama


if (empty($nim) || empty($namalengkap) || empty($gender) || empty($alamat) || empty($prodi) || empty($username) || empty($password) || empty($konfirpass)) {
   header("location: " . BASE_URL . 'regismhs.php?process=failedempty&nim='.$nim.'&namalengkap='.$namalengkap.'&gender='.$gender.'&alamat= '.$alamat.'&prodi='.$prodi.'&username='.$username.'&password='.$password.'');
} else {
   if ($password != $konfirpass) {
      header("location: " . BASE_URL . 'regismhs.php?process=failedpassword');
   } else {
      $query = mysqli_query($connection, "SELECT * FROM datamahasiswa WHERE username = '$username'");
      if (mysqli_num_rows($query) != 0) {
         header("location: " . BASE_URL . 'regismhs.php?process=failedusername');
      } else {
         mysqli_query($connection, 
         "INSERT INTO datamahasiswa (nim, namalengkap, jenisKelamin, alamat, prodi, username, password) 
         VALUES ('$nim', '$namalengkap', '$gender', '$alamat', '$prodi', '$username', '$hashedPassword')");
         header("location: " . BASE_URL . 'login.php?process=successregister');
      }
   }
}
?>
