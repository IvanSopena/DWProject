<?php



include 'Server/app/Route.php';
include 'Server/app/Router.php';
include 'Server/config/Config.php';
include  'Server/controllers/Home.php';
include 'Server/app/DB_Task.php';


// Si está en el directorio raíz dejar así, si no especificar como primer parámetro '/la-subcarpeta'
$error = "";
$tipo= "";
$router = new Router\Router('');
$home = new Home();
$sq = new DB_Task();

$sq->connect_DB();

$router->add('/', function() {
    $GLOBALS['home']->index();
});

$router->add('/registro', function() {
    $GLOBALS['home']->registro();
});

$router->add('/registrar', function() {
    $GLOBALS['registro']->registrar();
});

$router->add('/reset_password', function() {
    $GLOBALS['home']->reset_password();
});

$router->post('/login', function() {
    $GLOBALS['home']->login();
});


$router->add('/.*', function () {
    require_once  'Server/views/404.php';
});


$router->route();