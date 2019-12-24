<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function getUsers(){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("127.0.0.1", "root", "Rhenj567", "website");
    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $data = $DB->query('select id, username, email, phone
                          from users');

    $users = $data->fetch_all(MYSQLI_ASSOC);
//    var_dump($users->fetch_all(MYSQLI_ASSOC));

    mysqli_close($DB);
    
    return $users;
}

function getUser($email){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("127.0.0.1", "root", "Rhenj567", "website");

    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $dataUser = $DB->query("select id, username, password, email, phone
                              from users 
                             where email = '{$email}'");

    $user = $dataUser->fetch_all(MYSQLI_ASSOC);
//    var_dump($users->fetch_all(MYSQLI_ASSOC));

    mysqli_close($DB);
    
    return $user;
}

function addUser($data){
//    $DB = mysqli_connect("127.0.0.1", "andrei", "Aaaaaaa1", "website");
    $DB = mysqli_connect("127.0.0.1", "root", "Rhenj567", "website");

    if (!$DB) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    $sql = "insert into users(username, email, `password`, phone, age)
                       VALUES ('{$data['name']}', '{$data['email']}', '{$data['password']}', '{$data['phone']}', {$data['age']});";
//
//echo "Соединение с MySQL установлено!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

    $resultQuery = $DB->query($sql);

    mysqli_close($DB);
    
//    var_dump($resultQuery);
    
    return $resultQuery;
}

//$user = [
//    "username" => 'vasa-1',
//    "email" => 'vasa_1@gmail.com',
//    "password" => '444444444444',
//    "phone" => '+380406669922',
//    "age" => 43
//];

//addUser($user);