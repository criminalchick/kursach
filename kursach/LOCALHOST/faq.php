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
<link rel="stylesheet" href="faq.css" >
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
                <h1>Правила интернет-магазина "Фототехника"</h1>
                <h2>1. Заказы</h2>
                <p>Для совершения покупки в нашем магазине необходимо ознакомиться с каталогом товаров, добавить выбранные товары в корзину и оформить заказ на сайте.</p>
                <h2>2. Оплата</h2>
                <p>Мы принимаем оплату банковскими картами, электронными деньгами и наличными при самовывозе. Оплата производится в рублях РФ.</p>
                <h2>3. Доставка</h2>
                <p>Мы осуществляем доставку по всей России. Стоимость и сроки доставки зависят от вашего местоположения.</p>
                <h2>4. Возврат и обмен</h2>
                <p>Мы принимаем возврат и обмен товаров в течение 14 дней с момента получения заказа. Товар должен быть в оригинальной упаковке и состоянии.</p>
                <h2>5. Обратная связь</h2>
                <p>Если у вас возникли вопросы или проблемы, пожалуйста, свяжитесь с нашей службой поддержки по телефону или по электронной почте.</p>
                <p>Связаться с нами: info@fototechnika.com</p>


            </div>

        </div> 


  
       
</body>