<?php
if (isset($_SESSION['register'])) {
    header("Location: /profile/");
    exit;
}
?>
<head>
    <title>Войти</title>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <link rel="stylesheet" href="lehatest.css">
</head>

<body>
<div class="header">

        <a  href="../golova.php">Фототехника</a>
        <a href="../onas.php">О нас</a>
        <a href="../faq.php">FAQ</a>
        <a href="../auth/index.php">Личный кабинет</a>

</div>
    
    <form action="/admin/controllers/registration.php" method="post" class="m-auto">


        <div class="container">

            <h1>Регистрация</h1>

            <label for="surname"><b>Фамилия</b></label>
            <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="surname" name="surname" required>

            <label for="name"><b>Имя</b></label>
            <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="name" name="name" required>

            <label for="patronymic"><b>Отчество</b></label>
            <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="patronymic" name="patronymic"
                required>

            <label for="login"><b>Логин</b></label>
            <input type="text" class="form-control shadow-sm p-3 rounded-pill" id="login" name="login" required>

            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control shadow-sm p-3 rounded-pill" id="email" name="email" required>

            <label for="phone"><b>Телефон</b></label>
            <input type="tel" class="form-control shadow-sm p-3 rounded-pill" id="phone" name="phone" minlength="9"
                maxlength="13" pattern="/+?[0-9/(/)/-]+" placeholder="+7(XXX)-XXX-XX-XX" required>

            <label for="pwd"><b>Пароль</b></label>
            <input type="password" class="form-control shadow-sm p-3 rounded-pill" id="password" name="password"
                minlength="3" required>

            <label for="pwd-repeat"><b>Повторите пароль</b></label>
            <input type="password" class="form-control shadow-sm p-3 rounded-pill" id="password-repeat"
                name="password-repeat" minlength="3" required>

            <button type="submit"> Зарегистрироваться </button>

            <div>
                <p>Уже зарегистрированы? <a href="../auth/index.php">Войти</a>.</p>
            </div>
        </div>

    </form>
</body>