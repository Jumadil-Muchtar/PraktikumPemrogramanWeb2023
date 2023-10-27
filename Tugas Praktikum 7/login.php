<?php
session_start(); // Panggil session_start() hanya sekali di awal

$host = "localhost";
$user = "root";
$pass = "";
$db = "tugas7";
$username = "";
$password = "";
$error = "";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak Bisa Terkoneksi Ke Database");
}

// Periksa apakah ada permintaan logout
if (isset($_GET['logout'])) {
    if (isset($_SESSION['user_role'])) {
        // Hapus sesi dan arahkan ke halaman login
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa apakah username dan password diisi
    if ($username == '' || $password == '') {
        $error = "Silahkan Isi Semua Data";
    } else {
        // Melakukan query untuk mencari username di database
        $sql1 = "SELECT * FROM admin WHERE username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if (mysqli_num_rows($q1) < 1) {
            $error = 'Username Tidak Ditemukan';
        } else if ($r1['password'] != $password) {
            $error = 'Password Salah';
        } else {
            // Jika username dan kata sandi benar, maka arahkan ke halaman sesuai peran
            $_SESSION['login'] = true;

            // Tambahkan peran pengguna ke sesi berdasarkan awalan username
            if (strpos($username, 'admin') === 0) {
                $_SESSION['user_role'] = 'admin';
                $_SESSION['username'] = $username;
                header("Location: index.php"); // Jika awalan username adalah admin, arahkan ke halaman index.php
                exit();
            } elseif (strpos($username, 'user') === 0) {
                $_SESSION['user_role'] = 'user';
                $_SESSION['username'] = $username;
                header("Location: index2.php"); // Jika awalan username adalah user, arahkan ke halaman index2.php
                exit();
            }
        }
    }
}

// Verifikasi apakah admin sudah login
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['user_role'] === 'admin') {
        header("Location: index.php");
        exit();
    } elseif ($_SESSION['user_role'] === 'user') {
        header("Location: index2.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            max-width: 330px;
            margin: auto;
            background-color: gray;
        }

        .card {
            border-radius: 15px;
            margin: 120px auto;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        }

        .card-title {
            text-align: center;
            font-family: mullish;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="card mx-auto p-2">
        <div class="card-body p-3">
            <h2 class="card-title m-3">LOGIN</h2>
            <form action="" method="POST">
                <?php
                if ($error) {
                    // Menampilkan pesan $erroror
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                ?>
                <div class="form-group">
                    <div class="mb-3">
                        <label class="mb-1" for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="<?php echo $username; ?>" />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="password">Password</label>
                        <!-- Perbaikan: Tipe input harus "password" -->
                        <input type="password" class="form-control" name="password" id="password"
                            value="<?php echo $password; ?>" />
                    </div>

                    <div>
                        <button type='submit' class='btn btn-primary' name="login">Login</button>
                    </div>
                </div>
            </form>
            <p class="py-3">Tidak Punya Akun?
                <a class="link-opacity-50-hover" href="register.php?from=login">Register Disini</a>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>