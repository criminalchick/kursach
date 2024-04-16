<?php
include "connect.php";
function fnGetProfile($login)
{
    global $connect;
    $sql = sprintf("SELECT `surname`, `name`, `patronymic`, `phone`, `email` FROM `user`
WHERE `login` = '%s'", $login);
    if (!$result = $connect->query($sql)) {
        echo "Ошибка получения данных";
    }

    $row = $result->fetch_assoc();
    $data = sprintf('<p><span class="fw-semibold">Фамилия:</span> %s</p>
<p><span class="fw-semibold">Имя:</span> %s</p>
<p><span class="fw-semibold">Отчество:</span> %s</p>
<p><span class="fw-semibold">Телефон:</span> %s</p>
<p><span class="fw-semibold">Почта:</span> %s</p>',

        $row["surname"],
        $row["name"],
        $row["patronymic"],
        $row["phone"],
        $row["email"]
    );
    return $data;

}

function fnGetCardProfile($login)
{
    global $connect;
    $select = sprintf("SELECT `user_id` FROM `user` WHERE `login` = '%s'", $login);
    $select_result = $connect->query($select);
    $select_row = $select_result->fetch_assoc();
    $id = $select_row['user_id'];
    $data = '<div class="cards">';
    $sql = sprintf("SELECT `number`, `number_car`, `message`, `status` FROM
`application` INNER JOIN `user` ON `application`.`user_id` = `user`.`user_id` WHERE
`application`.`user_id` = '%s' ORDER BY `application_id` DESC", $id);
    if (!$result = $connect->query($sql)) {
        echo "Ошибка получения данных";
    }

    while ($row = $result->fetch_assoc()) {

        $data .= sprintf('<div class="card w-100 mb-3 mt-3">
    <div class="card-body">
    <h5 class="card-title">Нарушение №%s</h5>
    <p class="mb-1"><span class="fw-semibold">Статус:</span>
    %s</p>
    <p class="mb-1"><span class="fw-semibold">Гос номер
    авто:</span> %s</p>
    <p class="card-text">%s</p>
    </div>
    </div>',

            $row['number'],
            $row['status'],
            $row['number_car'],
            $row['message']
        );
    }

    while ($row = $result->fetch_assoc()) {

        if ($row['status'] == 'Отменен') {
            $data .= sprintf('<div class="card w-100 mb-3 mt-3
        // см. код Листинг 5.7
        </div>',
                $row['number'],
                $row['status'],
                $row['number_car'],
                $row['message']
            );
        } elseif ($row['status'] == 'Подтвержден') {
            $data .= sprintf('<div class="card w-100 mb-3 mt-3
        // см. код Листинг 5.7
        </div>',

                $row['number'],
                $row['status'],
                $row['number_car'],
                $row['message']
            );

        } else {
            $data .= sprintf('<div class="card w-100 mb-3 mt-3">
        // см. код Листинг 5.7

        </div>',
                $row['number'],
                $row['status'],
                $row['number_car'],
                $row['message']

            );

        }

    }
    $data .= "</div>";
    return $data;
}

function fnGetCardAdmin(){
    global $connect;

    $data = '<div class="cards">';
    $sql = "SELECT `application_id`, `surname`, `name`, `patronymic`, `number`,
`number_car`, `message`, `status` FROM `application` INNER JOIN `user` ON
`application`.`user_id` = `user`.`user_id` ORDER BY `application_id` DESC";

if(!$result = $connect->query($sql)){
echo "Ошибка получения данных";
}
// место для вывода карточек Листинг 5.8

while($row = $result->fetch_assoc()){

    $data .= sprintf('<div class="card w-100 mb-3 mt-3">
    <div class="card-body">
    <h5 class="card-title">Нарушение №%s </h5>
    <p class="mb-1">
    <span class="fw-semibold">Фамилия:</span> %s
    </p>
    <p class="mb-1">
    <span class="fw-semibold">Имя:</span> %s
    </p>
    <p class="mb-1">
    <span class="fw-semibold">Отчество:</span> %s
    </p>    
    <p>
    <span class="fw-semibold">Статус:</span>
    %s</p>
    <p>
    <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
    <p class="card-text">%s</p> 
    </div>
    </div>
<div class="d-flex align-items-center justify-content-between cards_btn">
<a href="controllers/update_applicate.php?id=%s&action=success" class="card-link
btn mb-3 mt-3 shadow-sm p-3 rounded-pill fw-bold btn-success">Подтвердить</a>
<a href="controllers/update_applicate.php?id=%s&action=cancel" class="card-link btn
mb-3 mt-3 shadow-sm p-3 rounded-pill fw-bold btn-success-outline border border-success
m-0">Отменить</a>
<a href="controllers/update_applicate.php?id=%s&action=delete" class="card-link btn
mb-3 mt-3 shadow-sm p-3 rounded-pill fw-bold btn-danger border border-success
m-0">Удалить</a>

</div>',
    $row['number'],
    $row['surname'],
    $row['name'],
    $row['patronymic'],
    $row['status'],
    $row['number_car'],
    $row['message'],
    $row['application_id'],
    $row['application_id'],
    $row['application_id'] );
    }
    while($row = $result->fetch_assoc()){

        if($row['status'] == 'Отменен'){
        $data .= sprintf('<div class="card mb-3 mt-3
        </div>',

        $row['number'],
        $row['status'],
        $row['number_car'],
        $row['message']);

        } elseif($row['status'] == 'Подтвержден'){
        $data .= sprintf('<div class="card w-100 mb-3 mt-3
        </div>',
        $row['number'],
        $row['status'],
        $row['number_car'],
        $row['message']);

        } else{
        $data .= sprintf('<div class="card w-100 mb-3 mt-3">

        </div>',
        $row['number'],
        $row['status'],
        $row['number_car'],
        $row['message']);
        }
        }
$data .= "</div>";
return $data;
}
function fnGetCardZayavaAdmin() {
    global $connect;

    $data = '<div class="cards">';
    $sql = "SELECT appointments_id, user.surname, user.name, user.email, user.phone, prava, certificate, date, time, opis, nomer
            FROM appointments
            INNER JOIN user ON appointments.user_id = user.user_id
            ORDER BY appointments_id DESC";
    if(!$result = $connect->query($sql)) {
        echo "Ошибка получения данных";
        return; // Добавляем `return`, чтобы выйти из функции, если запрос не удался
    }

    while($row = $result->fetch_assoc()) {
        $data .= sprintf('<div class="card w-100 mb-3 mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Заявка №%s</h5>
                                <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                                <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                                <p><span class="fw-semibold">Почта:</span> %s</p>
                                <p><span class="fw-semibold">Номер телефона:</span> %s</p>
                                <p><span class="fw-semibold">Права:</span> %s</p>
                                <p><span class="fw-semibold">Паспорт:</span> %s</p>
                                <p><span class="fw-semibold">Дата:</span> %s</p>
                                <p><span class="fw-semibold">Время:</span> %s</p>
                                <p><span class="fw-semibold">Сообщение:</span> %s</p> 
                            </div>
                          </div>', 
                          $row['nomer'],
                          $row['surname'],
                          $row['name'],
                          $row['email'],
                          $row['phone'],
                          $row['prava'],
                          $row['certificate'],
                          $row['date'],
                          $row['time'],
                          $row['opis']);
    }
    $data .= "</div>";
    return $data;
}