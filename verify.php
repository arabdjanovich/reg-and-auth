<?php
session_start();
include_once 'config/database.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = $connection->query("SELECT `verify_token`,`verify_status` FROM `badr` WHERE `verify_token` = '$token' LIMIT 1");

    if (mysqli_num_rows($verify_query) > 0) {
        $row = mysqli_fetch_array($verify_query);
        if ($row['verify_status'] == '0') {
            $clicked_token = $row['verify_token'];
            $update_query = $connection->query("UPDATE `badr` SET `verify_status` = '1' WHERE `verify_token` = '$clicked_token' LIMIT 1");

            if($update_query) {
                $_SESSION['status'] = 'Ваша почта подтверждена. Пожалуйста авторизуйтесь!';
                $_SESSION['status_code'] = 'success';
                session_unset();
                header('Location: login.php');
                exit;
            } else {
                $_SESSION['status'] = 'Произошла ошибка';
                $_SESSION['status_code'] = 'error';
                session_unset();
                header('Location: register.php');
                exit;
            }
        } else {
            $_SESSION['status'] = 'Вы уже подтверждали почту. Пожалуйста авторизуйтесь!';
            $_SESSION['status_code'] = 'info';
            header('Location: login.php');
            exit;
        }
        
    }else{
        $_SESSION['status'] = 'Неправильный код';
        $_SESSION['status_code'] = 'error';
        header('Location: verify-email.php');
        exit;
    }
} else {
    $_SESSION['status'] = 'Произошла ошибка';
    $_SESSION['status_code'] = 'error';
    session_unset();
    header('Location: register.php');
    exit;
}
?>