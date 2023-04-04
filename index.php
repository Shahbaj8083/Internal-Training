<?php
//simple routing code

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/home.php';
        break;


    case '/login':
        require __DIR__ . '/login.php';
        break;

    case '/register':
        require __DIR__ . '/register.php';
        break;

    case '/cart':
        require __DIR__ . '/shopping_cart.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
        break;
}

?>
