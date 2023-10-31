<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert | Admin</title>
</head>
<body>
    <h1>Insert Data Mahasiswa</h1>
        <form method="post" action="insert.php">
        <label for="nama">Masukkan Nama:</label>
        <input type="nama" id="nama" name="nama"
        required>
        <br>
        <label for="nim">Masukkan NIM:</label>
        <input type="nim" id="nim" name="nim"
        required>
        <br>
        <label for="prodi">Masukkan Prodi:</label>
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
            $nama = htmlspecialchars($_POST["nama"]);
            $nim = htmlspecialchars($_POST["nim"]);
            $prodi = htmlspecialchars($_POST["prodi"]);

            // Cek apakah NIM sudah ada dalam tabel
            $validasi = "SELECT nim FROM mahasiswa WHERE nim = ?";
            $stmt = $conn->prepare($validasi);
            $stmt->bind_param("s", $nim);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) { // NIM belum ada dalam tabel
                $stmt->close();

                // Insert data mahasiswa menggunakan prepared statement
                $sql = $conn->prepare("INSERT INTO `mahasiswa`(`nama`, `nim`, `prodi`) VALUES(?, ?, ?)");
                $sql->bind_param("sss", $nama, $nim, $prodi);

                if ($sql->execute()) {
                    echo "Pendaftaran berhasil!<br>";
                } else {
                    echo "Error: " . $sql->error;
                }
            } else {
                echo "NIM yang Anda Masukkan Sudah Ada<br>";
            }
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