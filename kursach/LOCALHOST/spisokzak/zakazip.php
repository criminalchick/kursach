<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="stylesheet" href="zakazi.css" >
</head>
<?php
include '../function/connect.php';

// Приемник значения из формы, с проверкой есть ли у нас уже выбранный статус для фильтрации
$search = $_GET['search'] ?? '';

$data = ''; // Инициализация переменной

// Модификация SQL запроса для учета выбранного статуса
$sql = "SELECT user_id, product_id, quantity
FROM zakazi
WHERE (user_id LIKE ? OR product_id LIKE ? OR quantity LIKE ?)";
$sql .= " ORDER BY user_id DESC;";

$stmt = $connect->prepare($sql);
if (!$stmt) {
    die("Ошибка подготовки запроса: " . $connect->error);
}

// Добавление параметра статуса в привязку, если необходимо
$search_param = "%$search%";
if ($search !== 'all') {
    $stmt->bind_param("sss", $search_param, $search_param, $search_param);
}

$stmt->execute();
$result = $stmt->get_result();

// Остальная часть кода остается без изменений...  
?>
<div class="search">
<?php
if ($result->num_rows > 0) {       
    while($row = $result->fetch_assoc()){   
        $data .= sprintf('<div class="card w-100 mb-3 mt-3"> 
        <div class="card-body">  
        <h5 class="card-title">Пользователь №%s </h5>  
        <p class="mb-1"><span class="fw-semibold">Номер продукта:</span> %s </p>  
        <p class="mb-1"><span class="fw-semibold">количество:</span> %s </p>  
        </div>',   
        htmlspecialchars($row['user_id']),  
        htmlspecialchars($row['product_id']),  
        htmlspecialchars($row['quantity']),);
    }  
    echo $data; // Вывод данных  
} else {   
    echo "0 результатов";   
} 
exit;
?>