<?php

$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
        $order_id = $_POST['order_id'];

        // Удаление заказа из таблицы "zakazi"
        $query_delete = "DELETE FROM zakazi WHERE user_id = ? AND product_id = ?";
        $stmt_delete = $mysqli->prepare($query_delete);
        $stmt_delete->bind_param("ii", $user_id, $order_id);
        $stmt_delete->execute();

        // Перенаправление на текущую страницу для избежания повторной отправки формы
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
          }

    $product_id = "";
    $quantity = "";

    $query = "SELECT product_id, quantity FROM zakazi WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            echo '<form method="post" action="">'; // Указываем метод POST и пустой action для отправки формы на текущую страницу
            echo '<div class="block">';
            echo '<label id="product_id" class="product_id">Код продуктов: '. $product_id .' </label><br>';
            echo '<label id="quantity" class="quantity">Количество: '. $quantity .' </label><br>';
            // Добавляем скрытое поле для передачи ID заказа
            echo '<input type="hidden" name="order_id" value="' . $product_id . '" >';
            echo '<input type="submit" name="delete_order" class="knopka" value="Удалить заказ">'; // Добавляем атрибут name для кнопки
            echo '</div>';
            echo '</form>';
        }
    }
}

$mysqli->close();
?>

