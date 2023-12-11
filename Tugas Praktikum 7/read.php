<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read | Admin</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <!-- <form method="post" action="read.php">
        <label for="nim">NIM Mahasiswa:</label>
        <input type="text" id="nim" name="nim" required>
        <button type="submit" id="admin">Cari</button>
    </form> -->
    <?php
        session_start();
        if(isset($_SESSION['verifyCRUD'])){
            $verifyCRUD = $_SESSION['verifyCRUD'];
        }
        if($verifyCRUD === true){
        $sql_mahasiswa = "SELECT nama, nim,prodi FROM mahasiswa ORDER BY nim ASC ";
        $result_mahasiswa = $conn->query($sql_mahasiswa);
        // $sql_mahasiswa = "SELECT nama, nim, prodi FROM mahasiswa ";
        // $stmt_mahasiswa = $conn->prepare($sql_mahasiswa);
        // $stmt_mahasiswa->bind_param("s", $nim);
        // $stmt_mahasiswa->execute();

        // $result_mahasiswa = $stmt_mahasiswa->get_result();

        if ($result_mahasiswa->num_rows > 0) {
            echo "=====================================================<br>";
            while ($row_mahasiswa = $result_mahasiswa->fetch_assoc()) {
            echo "Nama: " . $row_mahasiswa['nama'] . "<br>";
            echo "NIM: " . $row_mahasiswa['nim'] . "<br>";
            echo "Prodi: " . $row_mahasiswa['prodi'] . "<br>";
            echo "=====================================================<br>";
            }
        } else {
            echo "Data Mahasiswa Belum Terdaftar.";
        }

        $result_mahasiswa->close();
    }else{
        header('Location: login.php'); 
        exit;
    }
    ?>
    <br>
    <a href="admin.php"><button>Kembali</button></a>
</body>

</html>