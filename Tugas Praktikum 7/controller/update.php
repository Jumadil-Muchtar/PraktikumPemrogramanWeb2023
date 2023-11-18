<?php 

//panggil koneksi database
require_once('../config/base.php');
require_once('../config/connection.php');

//delete data
if (isset($_POST['submitubah'])) {
    $nim = $_POST['tnim'];
    $namalengkap = $_POST['tnama'];
    $gender = $_POST['tkelamin'];
    $alamat = $_POST['talamat'];
    $prodi = $_POST['tprodi'];
    $username = $_POST['tusername'];

    $update = mysqli_query($connection, 
    "UPDATE datamahasiswa 
    SET nim = '$nim',
        namaLengkap = '$namalengkap',
        prodi = '$prodi',
        jenisKelamin = '$gender',
        alamat = '$alamat',
        username = '$username'
    WHERE nim = '$nim';
    ");

    if ($update){
        echo "<script>
        alert('Data berhasil diubah!');
        window.location = '" . BASE_URL . "homeadm.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah!');
        window.location = '" . BASE_URL . "homeadm.php';
        </script>";
    }
}
?>
