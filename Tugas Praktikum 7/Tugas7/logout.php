<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman formulir_masuk.php setelah log out
header("Location: login.php");
exit();
?>
