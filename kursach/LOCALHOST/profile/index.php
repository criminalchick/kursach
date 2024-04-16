<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: /auth/");
    exit;
    
    if (isset($_SESSION["user_id"])){
    $user_id = $_SESSION['user_id'];
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
<link rel="stylesheet" href="profile.css" >
<title> Личный кабинет </title>
</head>
<body>

<div class="containerm1">
            <div class="header">
                <a class="header_logo" href="../golova.php">Фототехника</a>
                    <nav class="nav">
                     <a class="nav_link" href="/admin/">Админ панель</a>
                     <a class="nav_link" href="../faq.php">FAQ</a>
                     <a class="nav_link" href="/admin/controllers/logout.php">Выйти</a>
                 </nav>
            </div>
    <h1 class="h1">Личный кабинет</h1>
    <div class="leftblock">      
    <div class="danniye">
    <?php
        echo fnGetProfile($_SESSION['login']);
        echo fnGetCardProfile($_SESSION['login']);
    ?>
    </div>
    <div class="danniye2">
        <a class="zakazi"> Ваши заказы: </a>
        <?php
        include "../profile/zakazi.php";
        ?>
    </div>
    </div>
        <div class="rightblock">
        <h2 class="h2"> Адрес</h2>
        <?php
        include "../profile/adres.php"
        ?>


        </div>
</div>



<form action="/admin/controllers/add_application.php" method="post" class="m-auto needs-validation" novalidate>
</form>

