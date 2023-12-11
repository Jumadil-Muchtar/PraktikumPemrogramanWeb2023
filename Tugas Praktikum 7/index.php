<?php
include("./controllers/LoginController.php"); // include() digunakan untuk menggabungkan kode dari file eksternal

if (isset($_POST['submit'])) { // memeriksa apakah ada data yang dikirimkan melalui formulir HTML menggunakan metode POST dengan elemen bernama 'submit'.
    $register = new LoginController($_POST); // Jika kondisi ini benar, maka sebuah objek baru dari kelas LoginController dibuat dan diinisialisasi dengan data yang diterima melalui metode POST ($_POST)
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #3a4d39;
        }
        .container {
            background-color: #4f6f52;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #739072;
            border-color: #739072;
        }
        .btn-primary:hover {
            background-color: #ece3ce;
            border-color: #ece3ce;
        }
        .link-opacity-50-hover:hover {
            color: #ece3ce;
        }
    </style>
</head>

<body>
    <div class="container col-lg-4">
        <h1 class="text-center my-4" style="color: #ece3ce;">SIGN IN</h1>

        <?php
        if (isset($_GET['message'])) { // memeriksa apakah ada parameter dengan nama 'message' yang diterima menggunakan metode GET
            echo "<div class='alert alert-info' role='alert' style='background-color: #ece3ce; color: #3a4d39;'>$_GET[message]</div>";
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label" style="color: #ece3ce;">Username (NIM)</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: #ece3ce;">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
        <p style="color: #ece3ce;">Belum punya akun?
            <a href="./register.php" class="link-opacity-50-hover" style="color: #ece3ce;">Daftar di sini!</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
