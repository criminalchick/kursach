<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="icon" href="../iconfoto/favicon-32x32.png" type="image/x-icon">
<link rel="stylesheet" href="golova.css" >
</head>
<?php
$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";
$mysqli = new mysqli($host, $username, $password, $db);
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$query = "SELECT * FROM katalog";
$result = $mysqli->query($query);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['marka'])) {
        $marka = $mysqli->real_escape_string($_POST['marka']);

        $query = "SELECT * FROM katalog WHERE marka = '$marka'";
        $result = $mysqli->query($query);
    }
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['image_id'];
        $image_data = $row['image'];
        $name = $row['name'];
        $cena = $row['cena'];

        echo '<div class="tovar" id="'.$id.'">'; // Добавляем id для каждого товара
        echo '<div class="image">';
        echo '<a href="tovari/tovar.php?id='.$id.'"><img src="data:image/jpeg;base64,' . $image_data . '" /></a>';
        echo '</div>';
        echo '<p class="name">'.$name.'</p>';
        echo '<p class="cena">Цена: '.$cena.' рублей</p>';
        echo '</div>';
    }

}


else {
    echo "No data found.";
}

$mysqli->close();
?>