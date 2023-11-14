<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'login.php'
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

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
	<div class="container-register">
	<h1>Sign Up</h1>

	<form action="" method="post">

		<ul>
			<li>
				<input type="text" name="username" id="username" placeholder="Masukkan Username" required>
			</li>
			<li>
				<input type="password" name="password" id="password" placeholder="Masukkan Password" required>
			</li>
			<li>
				<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required>
			</li>
			<li>
				<input type="radio" name= "role" value ="Admin" required>Admin
			</li>
			<li>
				<input type="radio" name= "role" value ="Mahasiswa" required>Mahasiswa
			</li>
				<li>
				<button type="submit" name="register">Sign Up!</button>
			</li>
		</ul>
		
	</form>
	</div>

</body>
</html>