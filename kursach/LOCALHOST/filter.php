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
$image = "";
$name ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['marka'])) {
        $marka = $mysqli->real_escape_string($_POST['marka']);

        $query = "SELECT * FROM katalog WHERE marka = '$marka'";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['image_id'];
                $image = $row['image'];
                $name = $row['name'];

            }
        } else {
            echo "No results found.";
        }
    }
}
?>


<form method="post">
    <div class="filter">
        <input type="submit" class="box1" name="marka" value="Nikon">
        <input type="submit" class="box1" name="marka" value="Canon">
        <input type="submit" class="box1" name="marka" value="Sony">
        <input type="submit" class="box1" name="marka" value="GoPro">
        <input type="submit" class="box1" name="marka" value="Panasonic">
        <input type="submit" name="button" class="button" value="Сбросить фильтр">
    </div>
</form>