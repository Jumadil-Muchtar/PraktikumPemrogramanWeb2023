<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | Admin</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
        <form method="post" action="update.php">
        <label for="id">Masukkan NIM Mahasiswa yang ingin Diubah:</label>
        <input type="id" id="id" name="id"
        required>
        <br>
        <label for="nama">Masukkan Nama :</label>
        <input type="nama" id="nama" name="nama"
        required>
        <br>
        <label for="nim">Masukkan NIM :</label>
        <input type="nim" id="nim" name="nim"
        required>
        <br>
        <label for="prodi">Masukkan Prodi :</label>
        <input type="prodi" id="prodi" name="prodi"
        required>
        <br>
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
        $nama = htmlspecialchars($_POST["nama"]);
        $nim = htmlspecialchars($_POST["nim"]);
        $prodi = htmlspecialchars($_POST["prodi"]);

        // Cek apakah NIM sudah ada dalam tabel mahasiswa
        $sql_check_mahasiswa = "SELECT nim FROM mahasiswa WHERE nim = ?";
        $stmt_check_mahasiswa = $conn->prepare($sql_check_mahasiswa);
        $stmt_check_mahasiswa->bind_param("s", $nim);
        $stmt_check_mahasiswa->execute();
        $result_check_mahasiswa = $stmt_check_mahasiswa->get_result();

        // Cek apakah NIM sudah ada dalam tabel mahasiswa untuk inputan nim yg ingin diubah
        $sql_check_inputan = "SELECT nim FROM mahasiswa WHERE nim = ?";
        $stmt_check_inputan = $conn->prepare($sql_check_inputan);
        $stmt_check_inputan->bind_param("s", $id);
        $stmt_check_inputan->execute();
        $result_check_inputan = $stmt_check_inputan->get_result();
        // mengecek apakah nim yg ingin diubah ada di tabel mahasiswa
        if($result_check_inputan->num_rows == 1){
            if (($result_check_mahasiswa->num_rows == 0 ) || $nim === $id) {
                    
                // NIM tidak ada di kedua tabel atau NIM baru sama dengan NIM lama
                $sql_update_mahasiswa = "UPDATE mahasiswa SET nama = ?, nim = ?, prodi = ? WHERE nim = ?";
                $stmt_mahasiswa = $conn->prepare($sql_update_mahasiswa);
                $stmt_mahasiswa->bind_param("ssss", $nama, $nim, $prodi, $id);
    
                // Melakukan Perubahan nim pada tabel user
                $sql_update_user = "UPDATE user SET id = ? WHERE id = ?";
                $stmt_user = $conn->prepare($sql_update_user);
                $stmt_user->bind_param("ss", $nim, $id);
    
                // Lakukan perubahan di kedua tabel secara bersamaan
                $conn->begin_transaction();
    
                if ($stmt_mahasiswa->execute() && $stmt_user->execute()) {
                    $conn->commit();
                    echo "Perubahan berhasil!<br>";
                } else {
                    $conn->rollback();
                    echo "Error: " . $stmt_mahasiswa->error;
                }
    
                // Tutup pernyataan
                $stmt_mahasiswa->close();
                }
            else if($result_check_mahasiswa->num_rows == 1){
                echo"NIM baru yang anda input sudah ada";
            } 
        }else{
            echo"NIM yang ingin anda ubah tidak ada";
        }
            
        

        // Tutup pernyataan
        $stmt_check_mahasiswa->close();
        $stmt_check_inputan->close();
        $conn->close();
    }
}else{
    header('Location: login.php'); 
    exit;
}
    ?>
    <a href="admin.php"><button>Kembali</button></a>
    
</body>
</html>