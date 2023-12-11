<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
</head>
<body>
    <h1>Pendaftaran Akun Mahasiswa</h1>
    <form method="post" action="daftar.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
        required>
        <br>
        <button type="submit">Submit</button>
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = htmlspecialchars($_POST["id"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        // Persiapkan pernyataan SQL
        $sql = $conn->prepare("INSERT INTO `user`(`id`,`username`, `password`) VALUES(?,?,?)");
        $sql->bind_param("sss", $id, $username, $password);
    
        // Validasi username
        $validasi_nim = "SELECT id FROM user WHERE id = ?";
        $stmt = $conn->prepare($validasi_nim);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result_nim = $stmt->get_result();
    
        if ($result_nim->num_rows == 0) {
            if ($sql->execute()) {
                echo "Pendaftaran berhasil!<br>";
            } else {
                echo "Error: " . $sql->error;
            }
        } else {
            echo "Username yang dimasukkan sudah ada.";
        }
    
        // Tutup koneksi
        $stmt->close();
        $conn->close();
    }
    ?>
    <a href="login.php"><button>Kembali</button></a>
</body>
</html>