<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <?php
        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
        } else {
            // Pengguna belum login, mungkin Anda ingin melakukan pengalihan atau menampilkan pesan kesalahan.
            header('Location: login.php'); 
            exit;
        }
        
        // Prepared statement untuk mengambil data pengguna
        $sql_user = "SELECT username, password FROM user WHERE username = ?";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("s", $username);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();
        
        // Prepared statement untuk mencocokkan ID dengan username
        $cocok = "SELECT id FROM user WHERE username = ?";
        $stmt_cocok = $conn->prepare($cocok);
        $stmt_cocok->bind_param("s", $username);
        $stmt_cocok->execute();
        $result_cocok = $stmt_cocok->get_result();
        
        if ($result_cocok->num_rows == 1) {
            $row = $result_cocok->fetch_assoc();
            $id = $row['id'];
        
            // Prepared statement untuk mengambil data mahasiswa berdasarkan ID
            $sql_mahasiswa = "SELECT nama, nim, prodi FROM mahasiswa WHERE nim = ?";
            $stmt_mahasiswa = $conn->prepare($sql_mahasiswa);
            $stmt_mahasiswa->bind_param("s", $id);
            $stmt_mahasiswa->execute();
            $result_mahasiswa = $stmt_mahasiswa->get_result();
        
            if ($result_user->num_rows == 1) {
                $row_user = $result_user->fetch_assoc();
                $row_mahasiswa = $result_mahasiswa->fetch_assoc();
                if (password_verify($password, $row_user["password"])) {
                    // Dicek apakah ada nilai di array mahasiswa yang login
                    if ($result_mahasiswa->num_rows == 0) {
                        echo "Admin Belum Menginput data Anda";
                    } else {
                        echo "Nama : ", $row_mahasiswa['nama'];
                        echo "<br>";
                        echo "NIM : ", $row_mahasiswa['nim'];
                        echo "<br>";
                        echo "Prodi : ", $row_mahasiswa['prodi'];
                        echo "<br>";
                        echo "<br><a href=login.php><button>Logout</button></a>";
                    }
                }
            } else {
                echo "Password yang Anda masukkan salah.";
            }
            $stmt_user->close();
            $stmt_cocok->close();
            $stmt_mahasiswa->close();
            $conn->close();
        }
        
    ?>
    
</body>

</html>