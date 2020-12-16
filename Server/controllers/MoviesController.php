<?php

class MoviesController extends Controlador
{


	public function __construct()
	{
    }

    public function ver_pelicula()
    {
		$model = $this->modelo('MoviesModel');
		session_start();
		$triller = $model->pelicula_para_ver($_GET["id"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewer', $triller);
    }
    
    public function agregar_pelicula()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('MoviesModel');
		session_start();
		$model->agrega_favorita($_GET["id"],$_GET["mov"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);

	
		$this->vista('main', '');
	}

	public function borrar_pelicula()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('MoviesModel');
		session_start();
		$model->borrar_favorita($_GET["id"],$_GET["mov"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);

		$this->vista('viewall', 'fav');
    }
    
    public function vertodas()
	{
		session_start();
		$GLOBALS['sq']->connect_DB();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewall', $_GET["id"]);
	}
    
}