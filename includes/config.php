<?php
    $dataConfig = [
        'host' => '',
        'login' => '',
        'password' => '',
        'database' => ''
    ];

    $data = mysqli_connect($dataConfig['host'], $dataConfig['login'], $dataConfig['password'], $dataConfig['database']);

    if (!$data) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>
