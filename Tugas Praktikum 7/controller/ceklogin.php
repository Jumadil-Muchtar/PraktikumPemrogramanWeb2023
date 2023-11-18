<!-- <?php
require_once('config/base.php');
require_once('config/connection.php');
// jika URL http://localhost/Praktikum7/login.php?process=loginadmin, 
// maka $process akan diisi dengan nilai 'loginadmin'. Jika 
// URL adalah http://localhost/Praktikum7/login.php tanpa parameter GET 'process', 
// maka $process akan diisi dengan nilai false.

$process = isset($_GET['process']) ? ($_GET['process']) : false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
   $username = $_POST["username"];
   $password = $_POST["password"];
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   $akunmhs = mysqli_query($connection, "SELECT * FROM datamahasiswa WHERE username = '$username' AND password = '$hashedPassword'");
   if (mysqli_num_rows($akunmhs) === 1) {
      header("Location: " . BASE_URL . 'homemhs.php');
      exit;      
   } else {
      // Login gagal, tampilkan pesan kesalahan
      header("Location: " . BASE_URL . 'login.php?process=failedlogin');
   }

   $akunadm = mysqli_query($connection, "SELECT * FROM akunadmin WHERE username = '$username' AND password = '$hashedPassword'");
   if (mysqli_num_rows($akunadm) === 1) {
      header("Location: " . BASE_URL . 'homeadm.php');
      exit;
   } else {
      // Login gagal, tampilkan pesan kesalahan
      header("location: " . BASE_URL . 'login.php?process=failedlogin');
   }
}
?> -->