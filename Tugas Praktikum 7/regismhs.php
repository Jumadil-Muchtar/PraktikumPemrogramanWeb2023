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
   <link rel="stylesheet" href="style.css">
   <title>Registrasi Mahasiswa</title>
</head>
<body>
   <div class="container">
      <?php if ($process == 'failedempty') : ?>
         <div class="alert alert-danger" style="background-color: red; margin: auto; padding: 1em; color: white; border-radius: 20px;">
            Registrasi gagal, terdapat form yang kosong
         </div>
      <?php endif; ?>
      <?php if ($process == 'failedusername') : ?>
         <div class="alert alert-danger" style="background-color: red; margin: auto; padding: 1em; color: white; border-radius: 20px;">
            Registrasi gagal, username sudah terdaftar di database
         </div>
      <?php endif; ?>
      <?php if ($process == 'failedpassword') : ?>
         <div class="alert alert-danger" style="background-color: red; margin: auto; padding: 1em; color: white; border-radius: 20px;">
            Registrasi gagal, password tidak sesuai
         </div>
      <?php endif; ?>

   
      <h1 style="text-align: center; padding: 20px;">Registrasi Mahasiswa</h1>
      <form method="post" action="<?= BASE_URL . 'controller/cekmhs.php' ?>">
         <div class="form-row">
            <div class="col-md-4 mb-3">
               <label for="formNIM">NIM</label>
               <input type="text" name="nim" class="form-control" id="formNIM" placeholder="H071XXXXXX" required>               
            </div>
            <div class="col-md-4 mb-3">
               <label for="formNama">Nama Lengkap</label>
               <input type="text" name="namalengkap" class="form-control" id="formNama" placeholder="Robert Downey Jr." required>               
            </div>
            <div class="col-md-4 mb-3">
               <label for="formProdi">Program Studi</label>
               <input type="text" name="prodi" class="form-control" id="formProdi" placeholder="Ilmu Hitam" required>               
            </div>            
         </div>
         
         <div class="form-row">
            <div class="col-md-6 mb-3">                  
               <label for="formGender" >Jenis Kelamin</label>            
               <select name="gender" class="custom-select" id="formGender">
                  <option selected>Pilih...</option>
                  <option value="Laki-Laki" >Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
               </select>               
            </div>            
            <div class="col-md-6 mb-3">
               <label for="formAlamat">Alamat Domisili</label>
               <input type="text" name="alamat" class="form-control" id="formAlamat" placeholder="Jalan, Kecamatan, Kota" required>                              
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