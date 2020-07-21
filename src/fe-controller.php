<?php

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'index.php';
        break;
    case '/authenticate.php':
        require 'authenticate.php';
        break;
    case '/users.php':
        require 'users.php';
        break;
    case '/test.php':
        require 'test.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
?>
