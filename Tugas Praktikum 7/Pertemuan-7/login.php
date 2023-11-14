<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result); 

	// cek cookie dan username
	// if ($key === hash('sha256', $row['username'])) {
	// 	$_SESSION['login'] = true;
	// }
}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}


if (isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	$role = $_POST["role"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time() + 10);
				setcookie('key', hash('sha256', $row['username']), time() + 10);
			}

			
			if ($row['role'] == 'Admin') {
				$_SESSION['role'] = 'admin';
				header("Location: index-admin.php"); // Jika rolenya adalah 'Admin'
			} else {
				$_SESSION['role'] = 'mahasiswa';
				header("Location: index.php"); // Untuk peran lainnya (diasumsikan 'Mahasiswa')
			}

			exit;
		}
	}

	$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles/style.css">
</head>

<body>

	<div class="container-login">
		<div class="isi">
			<h1>Log In</h1>

			<?php if (isset($error)) : ?>
				<p style="color: red; font-style: italic;">username / password salah</p>
			<?php endif; ?>

			<form action="" method="post">

				<ul>
					<li>
						<input type="text" name="username" id="username" placeholder="Masukkan Username">
					</li>
					<li>
						<input type="password" name="password" id="password" placeholder="Masukkan Password">
					</li>
					<li>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember me</label>
					</li>
					<li>
						<button type="submit" name="login">Login</button>
					</li>
				</ul>
				<a href="registrasi.php">Sign Up</a>

			</form>
		</div>
	</div>

</body>
</html>