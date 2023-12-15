<!DOCTYPE html>
<html>
<head>
    <title>Formulir Masuk</title>
    <style>
  .center-text {
    text-align: center;
  }
</style>
</head>
<body>
    <h1 class="center-text">Formulir Masuk</h1> <hr>
    
    <?php
    session_start(); //fungsi untuk memulai sesi pengguna 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"]; // Tambahkan ini

       
        $server = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "db_mahasiswa";

        $conn = new mysqli($server, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        
        $sql = "SELECT username, password FROM users WHERE username='$username' AND role='$role'";
        $result = $conn->query($sql);
        //query digunakan untuk mengirimkan perintah SQL ke database dan menjalankannya.

        if ($result->num_rows == 1) {
            //untuk mengambil jumlah baris yang ada dalam hasil query. 
            $row = $result->fetch_assoc();
            
            
            if (password_verify($password, $row["password"])) {
            //password_verify(), yang digunakan untuk memeriksa apakah kata sandi yang dimasukkan oleh pengguna ($password) cocok dengan kata sandi yang telah disimpan dalam database ($row["password"]).
                $_SESSION["username"] = $username; //// Menyimpan informasi/autentifikasi untuk tau sp yg sedang login  
                $_SESSION["role"] = $role;

                
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
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required> <br> <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required> <br> <br>

        <!-- Tambahkan dropdown untuk memilih peran -->
        <label for="role">Peran:</label>
        <select id="role" name="role" required> 
            <option value="admin">Admin</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>
        <br> <br>

        <button type="submit">Masuk</button>
    </form>
</body>
</html>