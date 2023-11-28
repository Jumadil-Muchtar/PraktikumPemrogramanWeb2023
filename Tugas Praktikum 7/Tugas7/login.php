<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Masuk</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                <?php
                    session_start();
                    
                    // Periksa apakah pengguna sudah login, jika ya, redirect ke halaman yang sesuai
                    if (isset($_SESSION["username"])) {
                        if ($_SESSION["role"] == "admin") {
                            header("Location: halaman_admin.php");
                            exit();
                        } elseif ($_SESSION["role"] == "mahasiswa") {
                            header("Location: halaman_mahasiswa.php");
                            exit();
                        }
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $role = $_POST["role"]; // Tambahkan ini
                        
                        // Saring data pengguna dari database dan verifikasi kata sandi
                        $server = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "db_tugas";
                        
                        $conn = new mysqli($server, $db_username, $db_password, $db_name);
                        
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }
                        
                        // Sesuaikan kueri berdasarkan peran yang dipilih
                        $sql = "SELECT username, password FROM users WHERE username='$username' AND role='$role'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            
                            if (password_verify($password, $row["password"])) {
                                $_SESSION["username"] = $username;
                                $_SESSION["role"] = $role;
                                
                                // Sesuaikan pengalihan berdasarkan peran
                                if ($role == "admin") {
                                    header("Location: halaman_admin.php");
                                } elseif ($role == "mahasiswa") {
                                    header("Location: halaman_mahasiswa.php");
                                } else {
                                    echo "Autentikasi gagal. Peran tidak valid.";
                                }
                                
                                exit();
                            } else {
                                echo "Autentikasi gagal. Silakan coba lagi.";
                            }
                        } else {
                            echo "Autentikasi gagal. Silakan coba lagi.";
                        }
                        
                        $conn->close();
                    }
                ?>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Peran:</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="admin">Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <p>Belum memiliki akun? <a href="registrasi.php">Daftar disini</a></p>
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div>
</html>