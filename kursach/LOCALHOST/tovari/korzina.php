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
<link rel="stylesheet" href="korzina.css" >
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


            <div class="border-boxkorzina"> <a class="h">Корзина</a>
            <?php
            include "../tovari/korzinap.php"
            ?>
            </div>

        </div>
    </div> 
</body>