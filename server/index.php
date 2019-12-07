<?php

include './handlers/mysqliConnect.php';
include './handlers/validate.php';

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

include './handlers/routesMethodGet.php';

include './handlers/routesMethodPost.php';


getUsers();