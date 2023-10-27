<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tugas7";
$username = '';
$password = '';
$error = '';

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak Bisa Terkoneksi Ke Database");
}

if (isset($_POST["register"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apa ada username double
    $sql1 = "SELECT * FROM admin WHERE username = '$username'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($username == "" || $password == "") {
        $error = "Isi Data Dengan Benar";
    } else {
        if (mysqli_num_rows($q1) > 0) {
            $error = "Username Telah Digunakan";
        } else {
            // tambahkan ke db
            $sql2 = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
            $q2 = mysqli_query($koneksi, $sql2);

            if ($q2) {
                header('Location: login.php');
                exit;
            } else {
                $error = "Registrasi Gagal";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h2 class="card-title m-3">REGISTER</h2>
            <?php
            if ($error) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                header("refresh:3;url=register.php"); // 3 Detik Refresh 
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <div class="mb-3">
                        <label class="mb-1" for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="<?php echo $username ?>" />
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="<?php echo $password ?>" />
                    </div>

                    <div>
                        <button type='submit' class='btn btn-primary' name="register">Register</button>
                    </div>
                </div>
            </form>
            <p class="py-3">Sudah Punya Akun?
                <a class="link-opacity-50-hover" href="login.php">Login Disini</a>
            </p>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>