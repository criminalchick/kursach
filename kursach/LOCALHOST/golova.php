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
<link rel="stylesheet" href="golova.css" >
<title> Магазин Фототехники </title>
    </head>
<body>
        
    <div class="header">
            

        <div class="header_inner">

            <a class="header_logo" href="../golova.php">Фототехника</a>

                <nav class="nav">
                    <a class="nav_link" href="../onas.php">О нас</a>
                    <a class="nav_link" href="../faq.php">FAQ</a>
                    <a class="nav_link" href="../tovari/korzina.php">Корзина</a>
                    <a class="nav_link" href="../auth/index.php">Личный кабинет</a>

                </nav>

        </div>
        <div class="border-all">
            
             <div class="border-boxfiltr">Фильтр
                <?php
                include "filter.php"
                ?>
                
             </div>

            <div class="border-boxcenter">
            
            <?php
            include "katalog.php";
            ?>
            
            </div>



        </div>
    </div> 
</body>