<?php
require_once('config/base.php');
session_start();
session_unset();
session_destroy();

header("Location: " . BASE_URL . 'login.php');
?>