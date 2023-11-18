<?php 
require_once('../config/base.php');
require_once('../config/connection.php');

if (isset($_POST['submitsimpan'])) {
    $create = mysqli_query($connection, 
    "INSERT INTO datamahasiswa (nim, namalengkap, prodi, jeniskelamin, alamat, username)
    VALUES ('$_POST[tnim]', 
            '$_POST[tnama]',
            '$_POST[tprodi]',
            '$_POST[tkelamin]',
            '$_POST[talamat]',
            '$_POST[tusername]'
    )");

    if($create){
        echo "<script>
        $(document).ready(function(){
            $('#successModal').modal('show');
        });
        </script>";
        // echo "<script>
        // alert('Data gagal disimpan!');
        // window.location = '" . BASE_URL . "homeadm.php';
        // </script>";
    } else {
        echo "<script>
        $(document).ready(function(){
            $('#failedModal').modal('show');
        });
        </script>";
        // echo "<script>
        // alert('Data gagal disimpan!');
        // window.location = '" . BASE_URL . "homeadm.php';
        // </script>";
    }
} else{
    echo "gagal menyimpan...";
}
?>