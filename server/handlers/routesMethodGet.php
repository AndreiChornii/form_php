<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'GET') {
    # code...


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