<?php
session_start();
$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";
$mysqli = new mysqli($host, $username, $password, $db);

// Предположим, что у вас есть $_SESSION['user_id'] после входа пользователя в систему

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // получаем id текущего пользователя из сессии

    $query = "SELECT * FROM zakazi WHERE user_id = ?"; // добавляем условие WHERE для user_id
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id); // подставляем user_id в запрос
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];

            echo '<div class="tovar">'; // Добавляем id для каждого товара
            echo '<p class="productid">Код продуктов: ' . $product_id . '</p>';
            echo '<p class="quantity">Количество: ' . $quantity . '</p>';
            echo '</div>';
        }
    }
}

$mysqli->close();
?>