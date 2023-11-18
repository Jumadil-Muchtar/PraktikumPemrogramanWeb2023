<?php
require_once('config/base.php');
require_once('config/connection.php');
// jika URL http://localhost/Praktikum7/login.php?process=loginadmin, 
// maka $process akan diisi dengan nilai 'loginadmin'. Jika 
// URL adalah http://localhost/Praktikum7/login.php tanpa parameter GET 'process', 
// maka $process akan diisi dengan nilai false.

$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Registrasi Admin</title>
</head>
<body>
   <?php if ($process == 'failedempty') : ?>
      <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
         Registrasi gagal, terdapat form yang kosong
      </div>
   <?php endif; ?>
   <?php if ($process == 'failedusername') : ?>
      <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
         Registrasi gagal, username sudah terdaftar di database
      </div>
   <?php endif; ?>
   <?php if ($process == 'failedpassword') : ?>
      <div class="alert alert-danger" style="background-color: red; padding: 1em; color: white;border-radius: 20px;">
         Registrasi gagal, password tidak sesuai
      </div>
   <?php endif; ?>

   <div class="container">
      <h1 style="text-align: center; padding: 20px;">Registrasi Admin</h1>
      <form method="POST" action="<?= BASE_URL . 'controller/cekadm.php' ?>">
         <div class="form-row">
            <div class="col-md-6 mb-3">
               <label for="formEmail">Email</label>
               <input type="email" name="email" class="form-control" id="formEmail" placeholder="example@email.com" required>               
            </div>
            <div class="col-md-6 mb-3">
               <label for="formNama">Nama Lengkap</label>
               <input type="text" name="namalengkap" class="form-control" id="formNama" placeholder="Robert Downey Jr." required>
            </div>
         </div>

         <div class="form-row">
            <div class="col-md-4 mb-3">
               <label for="formUsername">Username</label>
               <input type="text" name="username" class="form-control" id="formUsername" pattern="[a-z0-9]{6,10}" required>
               <small id="usernamedHelpBlock" class="form-text text-muted">
                  Must be 6-10 characters long
               </small>              
            </div>
            <div class="col-md-4 mb-3">
               <label for="formPass">Password</label>
               <input type="password" name="password" class="form-control" id="formPass" placeholder="xxxxxx" pattern="[a-z0-9]{6}" required>
               <small id="passwordHelpBlock" class="form-text text-muted">
                  Password must contain letters and numbers
               </small>               
            </div>
            <div class="col-md-4 mb-3">
               <label for="formKonfirPass">Konfirmasi Password</label>
               <input type="password" name="konfirpass" class="form-control" id="formKonfirPass" pattern="[a-z0-9]{6}" required>
               <small id="passwordHelpBlock" class="form-text text-muted">
                  Please repeat your password
               </small>               
            </div>         
         </div>
         <button class="btn btn-primary" type="submit">Submit form</button>
      </form>
      <p style="text-align: center;">Sudah punya akun?<span><a href="<?= BASE_URL . "login.php" ?>" class=""> Masuk disini</a></span></p>
   </div>
</body>
</html>