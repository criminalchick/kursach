<?php
session_start();
include "auth/index.php";
unset($_SESSION['login']);
unset($_SESSION['user_id']);
unset($_SESSION['role']);
header("Location: /auth/");
exit;
?>
