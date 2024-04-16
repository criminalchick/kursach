<?php
$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";
$mysqli = new mysqli($host, $username, $password, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // Получаем данные из формы
    $image_dir = $_FILES['image']['tmp_name'];
    $image_data = base64_encode(file_get_contents($image_dir));
    $name = $_POST['name'];
    $marka = $_POST['marka'];
    $opis = $_POST['opis'];

    // Подготавливаем запрос SQL для вставки данных
    $query = "INSERT INTO katalog (image, name, marka, opis) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    // Привязываем параметры и выполняем запрос
    $stmt->bind_param("ssss", $image_data, $name, $marka, $opis);
    if ($stmt->execute()) {
        echo "Image and text successfully uploaded!";
    } else {
        echo "Error uploading image and text: " . $mysqli->error;
    }
}

$mysqli->close();
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" /><br>
    <input type="text" name="name" placeholder="Enter name" /><br>
    <input type="text" name="marka" placeholder="Enter marka" /><br>
    <input type="text" name="opis" placeholder="Enter opis" /><br>
    <input type="submit" value="Загрузить товар" />
</form>