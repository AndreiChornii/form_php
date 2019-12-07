<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method === 'POST') {
// header('Content-type:application/json');
    if ($route === '/login') {
        $request = json_decode(file_get_contents('php://input'), true);

        $isValid = valid($request);

        if ($isValid) {
            $response = [
                'result' => true,
                'message' => 'registration successful'
            ];
            $request['age'] = 50;
            addUser($request);

            echo json_encode($response);
        } else {
            $response = [
                'result' => false,
                'message' => $isValid
            ];

            echo json_encode($response);
        }
    }
}