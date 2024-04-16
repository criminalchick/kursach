<?php
session_start();
$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $db);

$image = "";
$name ="";
$opis="";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = $mysqli->real_escape_string($id);

    $query = "SELECT * FROM katalog WHERE image_id = '$id'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = $row['image'];
            $cena = $row['cena'];
            $name = $row['name'];
            $opis = $row['opis'];
            $image = base64_decode($image);


        }
// добавлю в корзину
if (isset($_POST['add_to_cart'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    /* мы меняем эту часть */
    $stmt = $mysqli->prepare("INSERT INTO korzina (user_id, product_id,image_id) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $product_id, $image);
    /* конец измененной части */

    if ($stmt->execute()) {
        header("Location: korzina.php"); 
        exit;
    } else {
        echo "Ошибка: " . $stmt->error;
    }
}

if (isset($_SESSION['user_id'])) {
    // чел вошел в систему.
}
}
}
$mysqli->close();
?>
    

<div class="name"><?php echo $name; ?></div>
<div class="headtovar">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" />
</div>
<div class="cena">Цена: <?php echo $cena; ?> рублей</div>
<div class="opis">
    <?php echo $opis; ?>
</div>
<form method="post">
    <input class="buu" type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
    <input class="sub6" type="submit" name="add_to_cart" value="В корзину">
</form>
