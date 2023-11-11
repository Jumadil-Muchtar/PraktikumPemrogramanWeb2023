<?php

include("./config/Connection.php");

class LoginController extends Connection
{
    public function __construct($data)
    {
        parent::__construct(); // memanggil konstruktor dari parent class

        $username = $data['username']; // mengambil nilai dari 'username' dalam array $data dan menyimpannya dalam variabel $username
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($this->connect, $query); // menjalankan query SQL ke database menggunakan objek koneksi MySQLi ($this->connect) dan menyimpan hasilnya dalam variabel $result.
        if (mysqli_num_rows($result) > 0) { // memeriksa apakah hasil query mengembalikan setidaknya satu baris data, jika ya maka dieksekusi
            while ($data = mysqli_fetch_assoc($result)) { // disimpan dalam bentuk array asosiatif dengan nama kolom sebagai kunci.
                session_start();
                // menyimpan data pengguna
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['prodi'] = $data['prodi'];
                $_SESSION['status'] = 'login'; // diset sebagai 'login' untuk menandakan bahwa pengguna sudah login.

                $_SESSION['role'] = $data['role']; // menyimpan peran, seperti 'admin' atau 'mahasiswa'.
                if ($data['role'] == 'admin') { // memeriksa nilai peran pengguna. 
                    header("Location: dashboard/index-admin.php?message=Selamat datang Admin"); // Jika admin, maka pengguna diarahkan ke halaman admin
                } else {
                    header("Location: dashboard/index.php?message=Selamat datang");
                }
            }
            return;
        } else {
            header("Location: ?message=Username atau password salah");
            return;
        }
    }
}
