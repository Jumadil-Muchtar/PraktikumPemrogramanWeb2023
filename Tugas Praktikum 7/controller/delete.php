<?php 

//panggil koneksi database
require_once('../config/base.php');
require_once('../config/connection.php');

//update data
if (isset($_POST['submithapus'])) {
    $nim = $_POST['nim'];
    $delete = mysqli_query($connection, "DELETE FROM datamahasiswa WHERE nim = '$nim'");

    if ($delete){
        echo "<script>
        // alert('Data berhasil dihapus!');
        window.location = '" . BASE_URL . "homeadm.php';
        </script>";
    } else {
        echo "<script>
        // alert('Data gagal dihapus!');
        window.location = '" . BASE_URL . "homeadm.php';
        </script>";
    }

}
?>