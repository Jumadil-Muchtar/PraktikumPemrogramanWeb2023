<?php
include("./controllers/RegisterController.php");

if (isset($_POST['submit'])) {
    $register = new RegisterController($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
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
        <h1 class="text-center mt-4" style="color: #ece3ce";>REGISTER</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label" style="color: #ece3ce;">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label" style="color: #ece3ce;">NIM</label>
                <input type="text" class="form-control" name= "nim" id="nim" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label" style="color: #ece3ce;">Prodi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: #ece3ce;">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label" style="color: #ece3ce;">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Daftar</button>
        </form>
        <p style="color: #ece3ce;">Sudah daftar?
            <a href="./index.php" class="link-opacity-50-hover" style="color: #ece3ce;">Login di sini!</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
