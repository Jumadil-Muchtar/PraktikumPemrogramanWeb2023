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
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Registrasi akun</h1>
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
                                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                                $role = $_POST["role"]; // Tambahkan baris ini
                        
                                $server = "localhost";
                                $db_username = "root";
                                $db_password = "";
                                $db_name = "db_tugas";
                        
                                $conn = new mysqli($server, $db_username, $db_password, $db_name);
                        
                                if ($conn->connect_error) {
                                    die("Koneksi gagal: " . $conn->connect_error);
                                }
                        
                                // Cek apakah username sudah ada
                                $check_query = "SELECT * FROM users WHERE username = ?";
                                $check_statement = $conn->prepare($check_query);
                                $check_statement->bind_param("s", $username);
                                $check_statement->execute();
                                $result = $check_statement->get_result();
                        
                                if ($result->num_rows > 0) {
                                    echo "Username sudah ada. Pilih username lain.";
                                } else {
                                    // Gunakan prepared statement untuk query INSERT
                                    $insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
                                    $insert_statement = $conn->prepare($insert_query);
                                    $insert_statement->bind_param("sss", $username, $password, $role);
                        
                                    if ($insert_statement->execute()) {
                                        echo "Pendaftaran berhasil!";
                                    } else {
                                        echo "Error: ". $insert_statement->error;
                                    }
                                }
                        
                                $check_statement->close();
                                $insert_statement->close();
                                $conn->close();
                            }
                        ?>
                        <form class="mt-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
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
                            
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Daftar</button>
                            
                            <p class="mt-3">Sudah punya akun? <a href="login.php">Login disini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password != confirm_password) {
                alert("Konfirmasi password tidak sesuai!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

