<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  .center-text {
    text-align: center;
  }
</style>
    <title>Formulir Pendaftaran Pengguna</title>
    
</head>
<body>
    <h1 class="center-text">Formulir Pendaftaran Pengguna</h1> <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
        //// untuk mengamankan password dengan cara mengenkripsinya sebelum disimpan dalam database
        $role = $_POST["role"]; 

        $server = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "db_mahasiswa";

        $conn = new mysqli($server, $db_username, $db_password, $db_name); //objek koneksi ke database 

        if ($conn->connect_error) {  //ini kalau dia gagal
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $check_query = "SELECT * FROM users WHERE username = ?"; //mengambil data dari tabel users dengan parameter ? untuk mencegah sql injeksi 
        $check_statement = $conn->prepare($check_query); //mempersiapkan pernyataan sql sblm dieksekusi 
        $check_statement->bind_param("s", $username); //us nya untuk mengisi tnda tnya 
        // mengikatkan nilai ke dalam prepared statement
        $check_statement->execute(); 

        $result = $check_statement->get_result(); 

        
        if ($result->num_rows > 0) { 
            echo "Username sudah ada. Silahkan pilih username lain.";
        } else {
            $insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)"; //untuk menyisipkan data pengguna baru ke dalam tabel "users.
            $insert_statement = $conn->prepare($insert_query); // pernyataan persiapan dibuat untuk query penyisipan
            $insert_statement->bind_param("sss", $username, $password, $role);

            if ($insert_statement->execute()) { //Jika eksekusinya berhasil
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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">  
    <!-- diperiksa data sebelum menampilkannya di halaman -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required> <br> <br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required> <br> <br>

        <label for="role">Peran:</label>
        <select id="role" name="role" required> 
            <option value="admin">Admin</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>
        <br> <br>

        <label for="confirm_password">Konfirmasi Password:</label> 
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br> <br>
        
        <button type="submit">Daftar</button>
        <br>
        <!-- Setelah elemen form -->
        <p>Apakah kamu sudah mempunyai akun? <a href="login.php">Login disini</a></p>


    </form>

    <script>
        function validateForm() { //untuk memeriksa apakah kata sandi nya sudah sesuai atau blm 
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