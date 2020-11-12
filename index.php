<?php



include 'Server/app/Route.php';
include 'Server/app/Router.php';
include 'Server/app/Security.php';
include 'Server/config/Config.php';
include 'Server/library/Controlador.php';
include  'Server/controllers/Home.php';
include  'Server/controllers/Cover.php';
include 'Server/app/Db_CLASS.php';


// Si está en el directorio raíz dejar así, si no especificar como primer parámetro '/la-subcarpeta'
$error = "";
$tipo= "";
$router = new Router\Router('');
$home = new Home();
$cover = new Cover();
$sq = new Db_CLASS();
$security = new Security();


$router->add('/', function() {
    $GLOBALS['home']->index();
});

$router->add('/home', function() {
    $GLOBALS['cover']->index();
});

$router->add('/logoff', function() {
    $GLOBALS['cover']->logoff();
});

$router->add('/registro', function() {
    $GLOBALS['home']->registrarse();
});

$router->add('/registrar', function() {
    $GLOBALS['home']->registrar();
});

$router->add('/reset_password', function() { 
    $GLOBALS['home']->reset_password();
});

$router->add('/change_pass', function() { 
    $GLOBALS['home']->change_pass();
});

$router->post('/login', function() {
    $GLOBALS['home']->login();
});


$router->add('/.*', function () {
    require_once  'Server/views/404.php';
});


$router->route();