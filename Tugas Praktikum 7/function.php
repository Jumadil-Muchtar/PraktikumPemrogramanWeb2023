<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "universitas");

function query($query)
{
    global $conn; //supaya tidak kena variable scope
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) { //mengembalikan baris data sebagai array asosiatif
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO mahasiswa
    VALUES('','$nama', '$nim', '$fakultas', '$jurusan')
";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn); //mengembalikan jumlah baris yang terkena dampak oleh operasi SQL terakhir yang dijalankan pada koneksi database 
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);

}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                fakultas = '$fakultas',
                jurusan = '$jurusan'
            WHERE id = $id

";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa 
    WHERE nama LIKE '%$keyword%' OR
    id LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    fakultas LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data){
    global $conn;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //konfirmasi password
    if($password !== $password2){
        echo "<script> alert('konfirmasi password tidak sesuai')</script>";
        return false;
    }

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('Username telah digunakan')</script>";

        return false;
    }

    //enkiripsi password
    $password = password_hash($password, PASSWORD_DEFAULT); //algoritma yg dipilih secara default oleh php

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn); //menghasilkan angka 1 jika berhasil menghasilkan angka 0 jika gagal

    
}