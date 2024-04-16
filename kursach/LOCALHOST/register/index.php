<?php
session_start();
if(isset($_SESSION['registration'])){
    header("Location: /profile/");
    exit;
}
?>

<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="icon" href="../iconfoto/favicon-32x32.png" type="image/x-icon">
<link rel="stylesheet" href="index.css" >
</head>
<body>

<div class="container2">
            <div class="header">
                <a class="header_logo" href="../golova.php">Фототехника</a>
                    <nav class="nav">
                     <a class="nav_link" href="../onas.php">О нас</a>
                     <a class="nav_link" href="../faq.php">FAQ</a>
                 </nav>
            </div>
                
    <h1 class="h1">Регистрация</h1>

    <form action="/admin/controllers/registration.php" method="post" class="m-auto">

    <div class="mb-3">
    <label for="surname" class="mb-4">Фамилия</label><br>
    <input class="mi8" type="text" id="surname" name="surname" required>
    </div>

    <div class="mb-3">
    <label for="name" class="mb-4">Имя</label><br>
    <input class="mi8" type="text" id="name" name="name" required>
    </div>

    <div class="mb-3">
    <label for="patronymic" class="mb-4">Отчество</label><br>
    <input class="mi8" type="text" id="patronymic" name="patronymic" required>
    </div>

    <div class="mb-3">
    <label for="login" class="mb-4">Логин</label><br>
    <input class="mi8" type="text" id="login" name="login" required>
    </div>

    <div class="mb-3">
    <label for="email" class="mb-4">Адрес электронной почты</label><br>
    <input class="mi8" type="email" id="email" name="email" required>
    </div>

    <div class="mb-3">
    <label for="phone" class="mb-4">Телефон</label><br>
    <input class="mi8" type="tel" id="phone" name="phone" minlength="5" maxlength="17" pattern="/+?[0-9/(/)/-]+" placeholder="+7(XXX)-XXX-XX-XX" required>
    </div>

    <div class="mb-3">
    <label for="password" class="mb-4">Пароль</label><br>
    <input class="mi8" type="password" id="password" name="password" minlength="6" required>
    </div>

    <div class="mb-3">
    <label for="password-repeat" class="mb-4">Повторите пароль</label><br>
    <input class="mi8" type="password" id="password-repeat" name="password-repeat" minlength="6" required>
    </div>

    <div class="register">
    <input class="knopka" type="submit" value="Зарегистрироваться">
    </div>

</form>
</div>  
</body>
