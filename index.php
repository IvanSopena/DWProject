<?php


include 'server/app/Route.php';
include 'server/app/Router.php';
include 'server/app/Security.php';
include 'server/config/Config.php';
include 'server/library/Controlador.php';
include  'server/controllers/Home.php';
include  'server/controllers/Cover.php';
include 'server/app/Db_CLASS.php';




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

$router->add('/profile', function() {
    $GLOBALS['cover']->perfil();
});

$router->add('/registro', function() {
    $GLOBALS['home']->registro();
});

$router->add('/registrar', function() {
    $GLOBALS['home']->registrar_usuario();
});

$router->add('/reset_password', function() { 
    $GLOBALS['home']->reset_password();
});

$router->add('/change_pass', function() { 
    $GLOBALS['home']->cambiar_pass();
});

$router->post('/login', function() {
    $GLOBALS['home']->login();
});

$router->add('/update_profile', function() {
    $GLOBALS['cover']->update();
});

$router->add('/.*', function () {
    require_once  'Server/views/404.php';
});


$router->route();