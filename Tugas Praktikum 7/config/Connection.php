<?php

// menyimpan informasi koneksi database
define('DB_HOSTNAME', 'localhost'); // define : fungsi yang digunakan untuk mendefinisikan sebuah konstanta
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tugas7');

class Connection
{
    public $connect; // $connect digunakan untuk menyimpan koneksi ke database.

    public function __construct()
    {
        $this->connect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD); // Menggunakan mysqli_connect untuk membuat koneksi ke database

        if ($this->create_db()) { // Memanggil method create_db() untuk membuat database jika belum ada
            mysqli_select_db($this->connect, DB_NAME); // Jika database berhasil dibuat atau sudah ada, memilih database
            $this->create_table_user(); // Memanggil method create_table_user() untuk membuat tabel users jika belum ada
        }
    }

    private function create_db() // Method untuk membuat database jika belum ada
    {
        return mysqli_query($this->connect, "CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    }

    private function create_table_user() // Method untuk membuat tabel users jika belum ada
    {
        $query = "CREATE TABLE IF NOT EXISTS users(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            nama VARCHAR(255) NOT NULL,
            prodi VARCHAR(255),
            role VARCHAR(20) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        return mysqli_query($this->connect, trim($query)); // trim($query) : menghapus spasi putih (whitespace) di awal dan akhir string SQL
    }
}
