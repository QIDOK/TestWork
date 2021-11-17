<?php
    $dataConfig = [
        'host' => 'server186.hosting.reg.ru',
        'login' => 'u1096428_founder',
        'password' => '099661pas',
        'database' => 'u1096428_limit_mil_project'
    ];

    $data = mysqli_connect($dataConfig['host'], $dataConfig['login'], $dataConfig['password'], $dataConfig['database']);

    if (!$data) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>