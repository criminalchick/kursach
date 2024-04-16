<?php
session_start();
$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $db);
$product_id ="";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['remove'])) {
            // Удаление выбранных товаров из корзины
            if(isset($_POST['selected_products'])) {
                foreach($_POST['selected_products'] as $product_id) {
                    $query = "DELETE FROM korzina WHERE product_id = ? AND user_id = ?";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("ii", $product_id, $user_id);
                    $stmt->execute();
                }
            }
        } elseif (isset($_POST['update'])) {
            // Обновление количества выбранных товаров в корзине
            if(isset($_POST['selected_products'])) {
                foreach($_POST['selected_products'] as $product_id) {
                    $quantity = $_POST['quantity'][$product_id];
                    if ($quantity > 0) {
                        $query_update = "UPDATE korzina SET quantity = ? WHERE product_id = ? AND user_id = ?";
                        $stmt_update = $mysqli->prepare($query_update);
                        $stmt_update->bind_param("iii", $quantity, $product_id, $user_id);
                        $stmt_update->execute();
                    }
                }
            }
        
        } elseif (isset($_POST['checkout'])) {
            // Перенос выбранных товаров из корзины в таблицу "zakazi"
            if(isset($_POST['selected_products'])) {
                foreach($_POST['selected_products'] as $product_id) {
                    $query_select = "SELECT quantity FROM korzina WHERE user_id = ? AND product_id = ?";
                    $stmt_select = $mysqli->prepare($query_select);
                    $stmt_select->bind_param("ii", $user_id, $product_id);
                    $stmt_select->execute();
                    $result_select = $stmt_select->get_result();

                    if ($row = $result_select->fetch_assoc()) {
                        $quantity = $row['quantity'];

                        // Вставка товара в таблицу "zakazi"
                        $query_insert = "INSERT INTO zakazi (user_id, product_id, quantity) VALUES (?, ?, ?)";
                        $stmt_insert = $mysqli->prepare($query_insert);
                        $stmt_insert->bind_param("iii", $user_id, $product_id, $quantity);
                        $stmt_insert->execute();

                        // Удаление товара из корзины
                        $query_delete = "DELETE FROM korzina WHERE user_id = ? AND product_id = ?";
                        $stmt_delete = $mysqli->prepare($query_delete);
                        $stmt_delete->bind_param("ii", $user_id, $product_id);
                        $stmt_delete->execute();
                    }
                }
            }

            // Перенаправление на страницу заказа
            header('Location: zakaz.php');
            exit();
        }
    }

    // Вывод товаров из корзины
    $query = "SELECT katalog.*, korzina.quantity FROM katalog INNER JOIN korzina ON katalog.image_id = korzina.product_id WHERE korzina.user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<form method="post" action="korzina.php">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="tovar">';
        echo '<div class="image">
        <img src="data:image/jpeg;base64,' . $row['image'] . '" alt="Product Image">
        </div>';
        echo '<p class="name">Название товара: ' . $row['name'] . '</p>';
        echo '<p class="marka">Марка: ' . $row['marka'] . '</p>';
        echo '<p class="opis">Описание: ' . $row['opis'] . '</p>';
        echo '<p class="quantity">Количество: <input type="number" name="quantity[' . $row['image_id'] . ']" value="' . $row['quantity'] . '" min="1"></p>';
        echo "<input type='checkbox' name='selected_products[]' value='". $row['image_id'] ."'>";
        echo '</div>';
    }
    echo '<input type="submit" class="update" name ="update" value="Обновить количество">';
    echo '<input type="submit" class="remove" name ="remove" value="Удалить выбранные товары">';
    echo '<input type="submit" class="checkout" name ="checkout" value="Оформление заказа">';
    echo '</form>';


}
else {
    echo "Вам необходимо войти в систему, чтобы просмотреть вашу корзину.";
}
$mysqli->close();
?>