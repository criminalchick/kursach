<?php
session_start();
include '../../function/connect.php';
$sql = $connect->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
$sql->bind_param("ss", $_POST['login'], $_POST['password']);
$sql->execute();
$result = $sql->get_result();
if($result->num_rows){
    $row = $result->fetch_assoc();
    $_SESSION['login'] = $row['login'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['user_id'] = $row['user_id']; // Добавляем id пользователя в сессию
    header("Location: /profile/");
    exit;
} else {
    header("Location: /auth/index.php?message=Некорректный логин или пароль");
    exit;
}
if(isset($_SESSION))
?>