<?php
session_start();

require_once('config/base.php');
require_once('config/connection.php');
$process = isset($_GET['process']) ? ($_GET['process']) : false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
   $username = $_POST["username"];
   $password = $_POST["password"];
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   // if (condition) {
   //    # code...
   // }
   $akunmhs = mysqli_query($connection, "SELECT * FROM datamahasiswa WHERE username = '$username'");
   if (mysqli_num_rows($akunmhs) === 1) {
      $row = mysqli_fetch_assoc($akunmhs);
      if (password_verify($password, $hashedPassword)){
         $_SESSION["login"] = true;
         header("Location: " . BASE_URL . 'homemhs.php');
         exit;
      }else{
         // echo "Masuk disini!!!!!!!!!!!!";
      header("Location: " . BASE_URL . 'login.php?nama=andi&row='.$row['password']);
      exit;


      }

   } else {
      // echo mysqli_error($akunmhs);
      header("Location: " . BASE_URL . 'login.php?process=failedlogin&jumlahrow='.mysqli_num_rows($akunmhs));
   }

   $akunadm = mysqli_query($connection, "SELECT * FROM akunadmin WHERE username = '$username'");
   if (mysqli_num_rows($akunadm) === 1) {
      $row = mysqli_fetch_assoc($akunadm);
      if (password_verify($password, $row['password'])){
         $_SESSION["login"] = true;
         header("Location: " . BASE_URL . 'homeadm.php');
         exit;
      }
   } else {
      header("location: " . BASE_URL . 'login.php?process=failedlogin&jumlahrow='.mysqli_num_rows($akunmhs));
   }
}
?> 

<!DOCTYPE html>
<html>
<head>
   <title>Login</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="style.css"></link> -->
</head>
<body>   
   <?php
   if ($process === 'failedlogin'): ?>
      <div class="alert alert-danger"
         style="background-color: red; padding: auto; color: white; border-radius: 20px; text-align: center;">
         Login gagal, silakan periksa kembali username dan password yang anda masukkan!
      </div>
   <?php endif; ?>
   <?php if ($process == 'successregister'): ?>
      <div class="alert alert-success"
         style="background-color: green; padding: auto; color: white; border-radius: 20px; text-align: center;">
         Registrasi berhasil, silakan masuk dengan akun anda
      </div>
   <?php endif; ?>
      
   <div class="container" style="display: flex; justify-content: center; margin-top: 50px;">   
      <div class="form-group col-md-6">
         <h2>Login</h2>
         <form method="POST">
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
         </form> <br>
         <p>Belum punya akun? <span>
            <div class="a-container">
               <a href="<?= BASE_URL . "regisadm.php" ?>" class=""> Daftar sebagai admin</a> <br>
               <a href="<?= BASE_URL . "regismhs.php" ?>" class=""> Daftar sebagai mahasiswa</a>
            </div>
         </span></p>
      </div>
   </div>
</body>
</html>
