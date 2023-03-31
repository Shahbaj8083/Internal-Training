<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/index.php';
        break;

    case '/form':
        require __DIR__ . '/manage_user.php';
        break;

    case '/table':
        require __DIR__ . '/user.php';
        break;    

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>


