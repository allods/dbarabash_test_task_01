<?php

use Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

// Initialize the router
$router = new Router();

// Register routes
$router->addRoute('GET', '', 'HomeController', 'index');
$router->addRoute('GET', 'login', 'LoginController', 'index');
$router->addRoute('GET', 'register', 'RegistrationController', 'index');
$router->addRoute('GET', 'createUserResult', 'CreateUserResultController', 'index');
$router->addRoute('GET', 'logout', 'LogoutController', 'logout');
$router->addRoute('POST', 'createUser', 'CreateUserController', 'create');
$router->addRoute('POST', 'auth', 'AuthController', 'login');

// Dispatch the request
$router->dispatch();