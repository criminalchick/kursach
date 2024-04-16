<?php
if (isset($_SESSION["user_id"])){
}
if(isset($_GET['id'])) {
    $id = $_GET['id']; 
} 
?>

<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="icon" href="../iconfoto/favicon-32x32.png" type="image/x-icon">
<link rel="stylesheet" href="onas.css" >
<title> Магазин Фототехники </title>
    </head>
<body>
        
    <div class="header">
            

        <div class="header_inner">

            <a class="header_logo" href="../golova.php">Фототехника</a>

                <nav class="nav">
                    <a class="nav_link" href="../onas.php">О нас</a>
                    <a class="nav_link" href="../faq.php">FAQ</a>
                    <a class="nav_link" href="../auth/index.php">Личный кабинет</a>

                </nav>

        </div>
        <div class="border-all">
            <div class="border-box1">
                <h1>Добро пожаловать на сайт "Фототехника"</h1>
                <p>Мы - ваш надежный источник поиска и покупки необходимой вам фототехники. В нашем каталоге имеются все самые современные марки фотоаппаратов</p>
                <h2>Наши услуги:</h2>
                <ul>
                    <img src=../iconfoto/favicon-32x32(3).png ><a>Каталог фототехники</a><br>
                    <img src=../iconfoto/favicon-32x32(2).png ><a>Быстрая доставка по всей России</a><br>
                    <img src=../iconfoto/favicon-32x32(4).png ><a>Своевременная техподдержка</a>
                </ul>
                <p>Будьте в курсе последних поставок фототехники с нами!</p>
                <p>Связаться с нами: info@fototechnika.com</p>


            </div>



  
       
</body>