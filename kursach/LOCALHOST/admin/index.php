<?php
session_start();
if($_SESSION['role'] != "Администратор"){
header("Location: /profile/");
exit;

if (isset($_SESSION["user_id"])){
}
if(isset($_GET['id'])) {
    $id = $_GET['id']; 
} 
}
include "../function/function.php";
?>
<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="icon" href="../iconfoto/favicon-32x32.png" type="image/x-icon">
<link rel="stylesheet" href="panel.css" >
<title> Администратор </title>
</head>
<body>


<div class="containerm1">
    <div class="header">
                <a class="header_logo" href="../golova.php">Фототехника</a>
                    <nav class="nav">
                     
                     <a class="nav_link" href="../profile/index.php">Личный кабинет</a>
                     <a class="nav_link" href="/admin/controllers/logout.php">Выйти</a>
                 </nav>
            </div>
    <h1 class="panel"> Панель администратора </h1>
        <div>
             <title>Поиск</title>
        </div>
        <div class="dobavka">
            <h3> Добавление товара </h3>
                <?php
                include "dobavka.php";
                ?>
            </div>
            <div class="poisk">
            <form class="mx-auto">
                    <input class="polzovateli" type="text" id="search" name="search">
                    <input  type="submit" class="submit5" value=" Найти"><br> 
            </form>
                    <a href="../spisokzak/zakazi.php"> <input class="knopka" type="submit" value="Список заказов пользователей"></a>
                    </div>
                    <div class="vkluch">
                    <?php
                    include "../admin/search.php";
                    ?>
    
                    <?php 
                    echo fnGetCardAdmin();
                    ?>
                    </div>
           

</div>







