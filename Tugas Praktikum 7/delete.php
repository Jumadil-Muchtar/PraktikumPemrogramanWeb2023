<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | Admin</title>
</head>
<body>
    <h1>Delete Data Mahasiswa</h1>
        <form method="post" action="delete.php">
        <label for="id">Masukkan NIM Mahasiswa yang ingin Dihapus:</label>
        <input type="id" id="id" name="id"
        required>
        <button type="submit">Submit</button>
    </form>
    <?php
    session_start();
    if(isset($_SESSION['verifyCRUD'])){
        $verifyCRUD = $_SESSION['verifyCRUD'];
    }
    if($verifyCRUD === true){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = htmlspecialchars($_POST["id"]);
            // Cek apakah NIM sudah ada dalam tabel mahasiswa
            $sql_check_mahasiswa = "SELECT nim FROM mahasiswa WHERE nim = ?";
            $stmt_check_mahasiswa = $conn->prepare($sql_check_mahasiswa);
            $stmt_check_mahasiswa->bind_param("s", $id);
            $stmt_check_mahasiswa->execute();
            $result_check_mahasiswa = $stmt_check_mahasiswa->get_result();


            if ($result_check_mahasiswa->num_rows == 0 ) {
                // NIM tidak ditemukan di kedua tabel
                echo "NIM tidak ditemukan.<br>";
            } else {
                // Melakukan delete data pada tabel mahasiswa
                $sql_delete_mahasiswa = "DELETE FROM mahasiswa WHERE nim = ?";
                $stmt_mahasiswa = $conn->prepare($sql_delete_mahasiswa);
                $stmt_mahasiswa->bind_param("s", $id);

                // Lakukan perubahan di kedua tabel secara bersamaan
                $conn->begin_transaction();
                if ($stmt_mahasiswa->execute()) {
                    $conn->commit();
                    echo "Penghapusan Data berhasil!<br>";
                } else {
                    $conn->rollback();
                    echo "Error: " . $stmt_mahasiswa->error;
                }

                // Tutup pernyataan
                $stmt_mahasiswa->close();
                // $stmt_user->close();
                
            }

        // Tutup pernyataan
        $stmt_check_mahasiswa->close();
        // $stmt_check_user->close();
        }
        $conn->close();
}else{
    header('Location: login.php'); 
    exit;
}
    ?>
    <a href="admin.php"><button>Kembali</button></a>
    
</body>
</html>