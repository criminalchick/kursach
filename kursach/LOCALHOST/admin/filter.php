<?php
include 'G:/localhost/function/connect.php';

// Приемник значения из формы, с проверкой есть ли у нас уже выбранный статус для фильтрации
$search = $_GET['search'] ?? '';
$statusFilter = $_GET['statusFilter'] ?? 'all';

$data = ''; // Инициализация переменной

// Модификация SQL запроса для учета выбранного статуса
$sql = "SELECT application_id, surname, name, patronymic, number, number_car, message, status 
FROM application 
INNER JOIN user ON application.user_id = user.user_id 
WHERE (name LIKE ? OR surname LIKE ? OR patronymic LIKE ? OR number_car LIKE ? OR message LIKE ?)";



// Добавление параметра статуса в привязку, если необходимо
$search_param = "%$search%";
if ($statusFilter !== 'all') {
    $stmt->bind_param("ssssss", $search_param, $search_param, $search_param, $search_param, $search_param, $statusFilter);
} else {
    $stmt->bind_param("sssss", $search_param, $search_param, $search_param, $search_param, $search_param);
}

$stmt->execute();
$result = $stmt->get_result();
if ($statusFilter !== 'all') {
    $sql .= " AND status = ?";
}

$sql .= " ORDER BY application_id DESC;";

$stmt = $connect->prepare($sql);
if (!$stmt) {
    die("Ошибка подготовки запроса: " . $connect->error);
}


$stmt = $connect->prepare($sql); 
if (!$stmt) { 
    die("Ошибка подготовки запроса: " . $connect->error); 
} 



// Отображение результатов 
if ($result->num_rows > 0) {        
    while($row = $result->fetch_assoc()){  
        // Отформатированный вывод данных (следующая часть кода), аналогично тому, как вы это делали
    }   
    echo $data; // Вывод данных   
} else {    
    echo "0 результатов";    
}  
?>
