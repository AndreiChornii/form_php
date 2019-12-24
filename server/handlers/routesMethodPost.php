<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'POST') {
// header('Content-type:application/json');
    if ($route === '/registration') {
        $request = json_decode(file_get_contents('php://input'), true);

        $isValid = valid($request);

        if ($isValid) {
            $responseSuccess = [
                'result' => true,
                'message' => 'registration successful, go to login'
            ];
            
            $responseFail = [
                'result' => false,
                'message' => 'email or phone already exists'
            ];
            $request['age'] = 50;
            
            $isSave = addUser($request);
            
            if($isSave) {
                echo json_encode($responseSuccess);
            } else {
                echo json_encode($responseFail);
            }

            
        } else {
            $response = [
                'result' => false,
                'message' => $isValid
            ];

            echo json_encode($response);
        }
    }
    
    if ($route === '/login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $User = getUser($email);
        
        /* if not exists user in database or password is not correct
           send page login with error
         *          */
        if(empty($User) || empty($User[0]) || ($password != $User[0]['password'])) {
            $error = 'user not found, enter correct email';
            include './views/header.php';
            include './views/login.php';
            include './views/footer.php';
            die;
        }
        
        $_SESSION['user'] = $User[0];
        
        $isAdmin = $User[0]['email'] === 'admin@gmail.com';
         
        if($isAdmin) {
            header("Location: /users");
        } else {
            header("Location: /");
        }
       
        
    }
}