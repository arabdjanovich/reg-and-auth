<?php
    session_start();
    include_once 'config/database.php';
    
    
    if(isset($_POST['registerbtn'])){
        $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
        $password = filter_var(trim(md5($_POST['password'])), FILTER_SANITIZE_STRING);
        $cpassword = filter_var(trim(md5($_POST['cpassword'])), FILTER_SANITIZE_STRING);
        $verify_token = rand(1000, 9999);
        
        if($password === $cpassword) {

            $message = "Здравствуйте, уважаемый <b>$firstname</b>!<hr>Ваш верификационный номер: <b>$verify_token</b><br><a href='http://localhost/www/verify.php?token=$verify_token' target='_blank'>Нажмите сюда</a><hr>Спасибо за регистрацию!";
            $to = $email;
            $from = 'arabdjanovich@mail.ru';
            $subject = 'Подтверждение почты';
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";
            $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf8\r\n";
            $_SESSION['email'] = $email;
            
            $check_email = $connection->query("SELECT `email` FROM `badr` WHERE `email` = '$email' LIMIT 1");
            
            if (mysqli_num_rows($check_email) > 0) {
                $_SESSION['status'] = 'Такая почта существует в базе';
                $_SESSION['status_code'] = 'error';
                header('Location: register.php');
                exit;
            } else {
                $query_run = $connection->query("INSERT INTO `badr` (`firstname`, `email`, `phone`, `password`, `verify_token`) VALUES ('$firstname', '$email', '$phone', '$password', '$verify_token')");

                if ($query_run) {
                    mail($to, $subject, $message, $headers);
                    $_SESSION['status'] = "Чтобы завершить регистрацию, подтвердите вашу почту: $email";
                    $_SESSION['status_code'] = 'info';
                    header('Location: verify-email.php');
                    exit;
                } else {
                    $_SESSION['status'] = 'Регистрация не прошла, пожалуйста, повторите попытку позже';
                    $_SESSION['status_code'] = 'error';
                    header('Location: register.php');
                    exit;
                }
            }
            
        } else {
            $_SESSION['status'] = 'Пароли не совпали';
            $_SESSION['status_code'] = 'error';
            header('Location: register.php');
            exit;
        }
    }

?>