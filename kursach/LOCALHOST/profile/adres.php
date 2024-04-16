<?php

$host = "localhost";
$db = "db_demo_kaza";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $db);

$gorod_label = "";
$pochtaindex_label = "";

if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT email, phone FROM user WHERE user_id = ?";
    $stmt_user = $mysqli->prepare($query);
    $stmt_user->bind_param("i", $user_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        while ($row =  $result_user->fetch_assoc()) {
            $email = $row['email'];
            $phone = $row['phone'];
        }

        if (isset($_POST['gorod']) && isset($_POST['pochtaindex'])) {
            $gorod = $_POST['gorod'];
            $pochtaindex = $_POST['pochtaindex'];

            $query_address = "INSERT INTO address (gorod, pochtaindex, user_id) VALUES (?, ?, ?)";
            $stmt_address = $mysqli->prepare($query_address);
            $stmt_address->bind_param("ssi", $gorod, $pochtaindex, $user_id);
            $stmt_address->execute();

            // Устанавливаем значения для отображения на странице после успешной отправки формы
            $gorod_label = $gorod;
            $pochtaindex_label = $pochtaindex;
        } else {
            // Получаем значения из базы данных для отображения на странице
            $query_get_address = "SELECT gorod, pochtaindex FROM address WHERE user_id = ?";
            $stmt_get_address = $mysqli->prepare($query_get_address);
            $stmt_get_address->bind_param("i", $user_id);
            $stmt_get_address->execute();
            $result_address = $stmt_get_address->get_result();

            if ($result_address->num_rows > 0) {
                while ($row_address = $result_address->fetch_assoc()) {
                    $gorod_label = $row_address['gorod'];
                    $pochtaindex_label = $row_address['pochtaindex'];
                }
            }
        }
    }
}

$mysqli->close();
?>

<form action="index.php" method="post" class="m-auto">
    <div class="mb-1">
        <label for="gorod_label" id='gorod_label' class="gorod_label">Ваш город: <?php echo $gorod_label; ?> </label>
        <?php if (!$gorod_label) { ?>
            <input class="mi7" type="text" id="gorod" name="gorod" required>
        <?php } ?>
    </div>
    <div class="mb-1">
        <label for="pochtaindex_label" id='pochtaindex_label' class="pochtaindex_label">Ваш почтовый индекс: <?php echo $pochtaindex_label; ?> </label>
        <?php if (!$pochtaindex_label) { ?>
            <input class="mi7" type="text" id="pochtaindex" name="pochtaindex" required>
        <?php } ?>
    </div>
    <div class="mb-1">
        <label for="email" id='email' class="email">Ваша почта: <?php echo $email ?> </label>
    </div>
    <div class="mb-1">
        <label for="phone" id='phone' class="phone">Ваш телефон: <?php echo $phone; ?> </label>
    </div>

    <div class="vhod">
    <?php if (!$pochtaindex_label) { ?>
        <input type='hidden' name='address' value="<?php echo $row; ?>" >
        <input class="knopka1" type="submit" value="Привязать">
        <?php } ?>
    </div>
</form>