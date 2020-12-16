<?php


include 'server/app/Route.php';
include 'server/app/Router.php';
include 'server/app/Security.php';
include 'server/config/Config.php';
include 'server/library/Controlador.php';
include  'server/controllers/HomeController.php';
include  'server/controllers/ActionsController.php';
include  'server/controllers/MoviesController.php';
include 'server/app/Db_CLASS.php';



$error = null;
$type = null;
$siteKey="6LelWAkaAAAAAD7_ZHqojpz4XHAes81593BrdlSM";
$secretKey="6LelWAkaAAAAAMOjSxsoVWb0BAyi031H-5C8U9GL";
$router = new Router\Router('/DWproject');
$home = new HomeController();
$actions = new ActionsController();
$movies = new MoviesController();
$sq = new Db_CLASS();
$security = new Security();

$GLOBALS['sq']->connect_DB();

/***************  Rutas Controlador principal *******************/
$router->add('/', function() {
    $GLOBALS['home']->index();
});

$router->add('/logoff', function() {
    $GLOBALS['home']->logoff();
});

$router->post('/login', function() {
    $GLOBALS['home']->login();
});

$router->add('/registro', function() {
    $GLOBALS['home']->registro();
});

$router->post('/registrar', function() {
    $GLOBALS['home']->registrar_usuario();
});

$router->add('/reset_password', function() { 
    $GLOBALS['home']->reset_password();
});

$router->add('/change_pass', function() { 
    $GLOBALS['home']->cambiar_pass();
});

/************** Acciones navbar ********************* */
$router->add('/movies', function() {
    $GLOBALS['actions']->movies();
    
});

$router->add('/series', function() {
    $GLOBALS['actions']->series();
    
});

$router->post('/search', function() {
    $GLOBALS['actions']->buscar();
    
});

$router->add('/profile', function() {
    $GLOBALS['actions']->perfil();
});

$router->get('/read_notifications', function() {
    $GLOBALS['actions']->read_notifications();
});

/************** Acciones Perfil ********************* */

$router->add('/close_acount', function() {
    $GLOBALS['actions']->delete();
    
});

$router->post('/update_profile', function() {
    $GLOBALS['actions']->update();
});

/************** Acciones Visualizaciones ***********************/

$router->get('/ver', function() {
    $GLOBALS['movies']->ver_pelicula(); 
});

$router->get('/add_fav', function() {
    $GLOBALS['movies']->agregar_pelicula(); 
});

$router->get('/del_fav', function() {
    $GLOBALS['movies']->borrar_pelicula(); 
});

$router->get('/view_all', function() {
    $GLOBALS['movies']->vertodas();
    
});

/* Pagina no encontrada */
$router->add('/.*', function () {
    require_once  'Server/views/404.php';
});


$router->route();