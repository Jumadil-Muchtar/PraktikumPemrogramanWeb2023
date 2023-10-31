<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
        required>
        <br>
        <button type="submit" id="admin">Masuk</button>
    </form>
    <?php
        session_start();
        session_unset();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password'])) {

                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                /// atur masalah true atau false #####
                $sudahLogin = false;
                
                // Menggunakan prepared statement untuk menghindari SQL injection
                $sql_user = "SELECT username, password FROM user WHERE username = ?";
                $stmt = $conn->prepare($sql_user);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result_user = $stmt->get_result();
                
                if ($result_user->num_rows == 1) {
                    $row_user = $result_user->fetch_assoc();
                    
                    if (password_verify($password, $row_user["password"])) {
                        $sudahLogin = true;
                        if ($username === "admin") {
                            $_SESSION['verify'] = $sudahLogin;
                            header("Location: admin.php");
                            exit();
                        } else {
                            // Jika bukan admin, cek apakah username ada di database
                            if ($username === $row_user['username']) {
                                $cocok = "SELECT id FROM user WHERE username = ?";
                                $stmt = $conn->prepare($cocok);
                                $stmt->bind_param("s", $username);
                                $stmt->execute();
                                $hasil = $stmt->get_result();
                                $row = $hasil->fetch_assoc();
                                $id = $row['id'];
        
                                $sql_mahasiswa = "SELECT nama, nim, prodi FROM mahasiswa WHERE nim = ?";
                                $stmt = $conn->prepare($sql_mahasiswa);
                                $stmt->bind_param("s", $id);
                                $stmt->execute();
                                $result_mahasiswa = $stmt->get_result();
                                $row_mahasiswa = $result_mahasiswa->fetch_assoc();
        
                                
                                if (password_verify($password, $row_user["password"])) {
                                    // Dicek apakah ada nilai di array mahasiswa yang login
                                    if ($result_mahasiswa->num_rows == 0) {
                                        echo "Admin Belum Menginput data Anda";
                                        echo "<a href=login.php><button>Kembali</button></a>";
                                    } else {
                                        header("Location: mahasiswa.php");
                                        exit();
                                    }
                                }
                                
                            } else {
                                echo "Username tidak ditemukan.";
                            }
                        }
                    } else {
                        echo "Password yang Anda masukkan salah.<br>";
                    }
                } else {
                    echo "Username tidak ditemukan.<br>";
                }
            } else {
                echo "Anda Belum Login";
            }
            $conn->close();
        }

    ?>
    <a href="daftar.php"><button>Daftar Akun</button></a>
</body>
</html>