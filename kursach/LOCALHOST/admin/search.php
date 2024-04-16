<head>
<meta http-equiv="Content-Type" content="charset=utf-8" />
<link rel="stylesheet" href="panel.css" >
</head>
<body>
<?php
include '../function/connect.php';

// Приемник значения из формы, с проверкой есть ли у нас уже выбранный статус для фильтрации
$search = $_GET['search'] ?? '';

$data = ''; // Инициализация переменной

// Модификация SQL запроса для учета выбранного статуса
$sql = "SELECT user_id, surname, name, patronymic, login, email, phone, password, role
FROM user
WHERE (surname LIKE ? OR name LIKE ? OR email LIKE ? OR phone LIKE ? )";
$sql .= " ORDER BY user_id DESC;";

$stmt = $connect->prepare($sql);
if (!$stmt) {
    die("Ошибка подготовки запроса: " . $connect->error);
}

// Добавление параметра статуса в привязку, если необходимо
$search_param = "%$search%";
if ($search !== 'all') {
    $stmt->bind_param("ssss", $search_param, $search_param, $search_param, $search_param);
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
        <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s </p>  
        <p class="mb-1"><span class="fw-semibold">Имя:</span> %s </p>  
        <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s </p> 
        <p class="mb-1"><span class="fw-semibold">Логин:</span> %s </p>       
        <p class="mb-1"><span class="fw-semibold">Почта:</span> %s </p>      
        <p class="mb-1"><span class="fw-semibold">Номер:</span> %s</p>
        <p class="mb-1"><span class="fw-semibold">Пароль:</span> %s </p>    
        <p class="card-text">%s</p> 
        </div>',   
        htmlspecialchars($row['user_id']),  
        htmlspecialchars($row['surname']),  
        htmlspecialchars($row['name']),  
        htmlspecialchars($row['patronymic']),  
        htmlspecialchars($row['login']), 
        htmlspecialchars($row['email']),  
        htmlspecialchars($row['phone']),
        htmlspecialchars($row['password']), 
        htmlspecialchars($row['role']),);
    }  
    echo $data; // Вывод данных  
} else {   
    echo "0 результатов";   
} 
exit;
?>
</div>
</body>