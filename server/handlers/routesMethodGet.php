<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'GET') {
    # code...
    
    if(empty($_SESSION['routes'])) {
       $_SESSION['routes'] = [];
    } 
    
    if(empty($_SESSION['routes'][$route])) {
        $_SESSION['routes'][$route] = 1;
    } else {
        $_SESSION['routes'][$route]++;
    }
    
    $routes_str = '';
    
    foreach ($_SESSION['routes'] as $k => $v) {
        $routes_str .= "{$k} = {$v} ,";
    }
    
    

    include './views/header.php';

    if ($route === '/') {
        include './views/home.php';
    }

    if ($route === '/contacts') {
        include './views/contacts.php';
    }
 
    if ($route === '/registration') {
        include './views/registration.php';
    }
    
    if ($route === '/login') {
        include './views/login.php';
    }
    
    if ($route === '/users') {
        $users = getUsers();
//        var_dump($users);
        include './views/users.php';
    }

    include './views/footer.php';
}