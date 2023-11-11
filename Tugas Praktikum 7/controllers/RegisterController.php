<?php

include("./config/Connection.php");

class RegisterController extends Connection
{
    public function __construct($data)
    {
        parent::__construct();

        // menyimpan nilai-nilai yang diterima dari parameter $data
        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        $query = "SELECT * FROM users WHERE username = '$nim'";

        $result = mysqli_query($this->connect, $query); // menjalankan query SQL ke database menggunakan objek koneksi MySQLi ($this->connect) dan menyimpan hasilnya dalam variabel $result.
        if (mysqli_num_rows($result) > 0) { //  memeriksa apakah hasil query mengembalikan setidaknya satu baris data.
            echo "<script>alert('NIM sudah terdaftar!')</script>"; // menampilkan pesan peringatan
            return; // menghentikan eksekusi
        }

        if ($password == $confirmPassword) { // memeriksa apakah password yang dimasukkan oleh pengguna ($password) sama dengan konfirmasi password ($confirmPassword).
            $query = "INSERT INTO users VALUES ('', '$nim', '$nama', '$prodi', 'mahasiswa', '$password')"; // INSERT INTO untuk menyimpan data pengguna baru ke dalam tabel 'users'
            $result = mysqli_query($this->connect, $query); // Menjalankan query ke database menggunakan objek koneksi MySQLi ($this->connect) dan menyimpan hasilnya dalam variabel $result.

            header("Location: index.php?message=Berhasil mendaftar!"); // Mengarahkan pengguna ke halaman login (index.php) dengan pesan sukses (?message=Berhasil mendaftar!) menggunakan header()
            return $result;
            
        } else {
            echo "<script>alert('Konfirmasi password tidak sesuai!')</script>"; // Menampilkan pesan peringatan
            return;
        }
    }
}
