<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location: /profile/");
    exit;

}
?>

<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="icon" href="../iconfoto/favicon-32x32.png" type="image/x-icon">
<link rel="stylesheet" href="auth.css" >
</head>
<body>


<div class="containerm1">
            <div class="header">
                <a class="header_logo" href="../golova.php">Фототехника</a>
                    <nav class="nav">
                     <a class="nav_link" href="../onas.php">О нас</a>
                     <a class="nav_link" href="../faq.php">FAQ</a>
                 </nav>
            </div>

<?php
if(isset($GET['message'])){
echo "<div class= 'border border-danger text-danger text-center pt-4 pb-4 mb-3'>
{$_GET['message']}
</div>";
}
?>
    <h1 class="h1">Вход</h1>

    <form action="/admin/controllers/login.php" method="post" class="m-auto">

        <div class="mb-3">
            <label for="login" class="mi6">Ваш логин</label><br>
            <input class="mi7" type="text" id="login" name="login" required>
        </div>
            <div class="mb-3">
                <label for="password" class="mi6">Ваш пароль</label><br>
                <input class="mi7" type="password" id="password" name="password" required>
            </div>
                <div class="vhod">
                    <input class="knopka1" type="submit" value="Войти">
                </div>
            

    </form>
            <div class="mb-5">
                <a>Или же зарегистрируйтесь</a><br>
                <a href="../register/index.php"> <input class="knopka" type="submit" value="Зарегистрироваться"></a>
            </div>
</div>
</body>
