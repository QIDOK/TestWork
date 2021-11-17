<?php
    include("config.php");
    include("functions.php");
    switch($_POST['type']) {
        case 'register':
            $login = $_POST['login'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['passwordRepeat'];

            if(!$login || !$mail || !$password || !$passwordRepeat) {
                exit(response(false, "<p class='error'>Заполните все поля.</p>"));
            }

            if($password !== $passwordRepeat) {
                exit(response(false, "<p class='error'>Пароли не эдентичны.</p>"));
            }

            $user = querySelect("SELECT * FROM `accounts` WHERE `mail` = '$mail'", $data);

            if($user) {
                exit(response(false, "<p class='error'>Данный электронный адрес зарегистрирован.</p>"));
            }

            mysqli_query($data, "INSERT INTO `accounts` (`name`, `mail`, `password`) VALUES ('$login', '$mail', '$password')");

            exit(response(true, "<p>Аккаунт создан!<br>Добро пожаловать, $login!</p>"));
            
            break;

        case 'auth':
            $login = $_POST['login'];
            $password = $_POST['password'];

            if(!$login || !$password) {
                exit(response(false, "<p class='error'>Заполните все поля.</p>"));
            }

            $user = querySelect("SELECT * FROM `accounts` WHERE `mail` = '$login' and `password` = '$password'", $data);
            if(!$user) {
                exit(response(false, "<p class='error'>Логин или пароль неверны.</p>"));
            }

            exit(response(true, "<p class='success'>Добро пожаловать, {$user['name']}!</p>"));
            break;
    }
?>