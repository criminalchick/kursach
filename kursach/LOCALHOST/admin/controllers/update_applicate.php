<?php include "../../function/connect.php";
if (isset ($_GET['action'])) {
    switch ($_GET['action']) {
        case 'success':
            $sql = sprintf("UPDATE `application` SET `status`='%s' WHERE `application_id` = '%s'", 'Подтвержден', $_GET['id']);
            $connect->query($sql);
            header("Location: /admin/");
            exit;
        case 'cancel':
            $sql = sprintf("UPDATE `application` SET `status`='%s' WHERE `application_id` = '%s'", 'Отменен', $_GET['id']);
            $connect->query($sql);
            header("Location: /admin/");
            exit;
        case 'delete':
            $sql = sprintf("DELETE from `application` WHERE `application_id` = '%s'", $_GET['id']);
            $connect->query($sql);
            header("Location: /admin/");
            exit;
        case 'deletedate':
            $sql = sprintf("DELETE FROM `date` WHERE `id_date` = '%s'", $_GET['id']);
            $connect->query($sql);
            header("Location: /admin/");
            exit;
        case 'updatedate':
            $sql = sprintf("UPDATE `date` SET `status`='Записан' WHERE `id_date` = '%s'", $_GET['id']);
            $connect->query($sql);
            header("Location: /admin/");
            exit;
    }
} ?>
