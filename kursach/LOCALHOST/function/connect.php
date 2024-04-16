<?php
$connect = new mysqli("localhost", "root", "", "db_demo_kaza");
if($connect->connect_error){
die ("Ошибка подключения к базе данных");
}
?>
