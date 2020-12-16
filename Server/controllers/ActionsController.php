<?php

class ActionsController extends Controlador
{


	public function __construct()
	{
	}

/************** Acciones navbar ********************* */

    public function movies()
	{

		session_start();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('movies', '');
	}

	public function series()
	{

		session_start();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('series', '');
    }

    public function buscar()
	{
		session_start();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewall', $_POST["busqueda"]);
    }

    public function perfil()
	{
		
        $model = $this->modelo('UserModel');
        session_start();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
        $resultado = $model->obtener_perfil($_SESSION["user"]);
        
        $this->vista('profile',$resultado);
	
    }
    
    public function read_notifications()
    {
        session_start();
        $GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
        $model = $this->modelo('UserModel');
        $datos = $model->quitar_notificacion($_GET["id"]);
        
        $this->vista('main', '');
    }

	/************** Acciones Perfil ********************* */

	public function delete()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('UserModel');
		session_start();
		
		 if($model->BorrarPerfil($_SESSION["user"])===true)
			{
				session_unset();
				$this->vista('login', '');
				
			}else{
			
				$this->perfil();
				$GLOBALS['sq']->DbClose();
				
			}

	}

	public function update()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('UserModel');
	
		session_start();

		$Foto = $_POST["thefile"];
		$Nombre = $_POST["name"];
        $Apellidos = $_POST["surname"];
        $Email = $_POST["email"];
        $password = $_POST["pass"];
		$fecha = $_POST["brid"];
		$pais = $_POST["country"];
		$plan = $_POST["plan"];

		$password = $GLOBALS['security']->crypt($password, strtoupper($Email));

		if($Foto === ""){
			$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
			$Foto = $GLOBALS['sq']->getfoto();
		}

		$model->EditProfile($Foto,$Nombre,$Apellidos,$Email,$password,$fecha,$pais,$plan,$_SESSION["user"]);

		$resultado = $model->obtener_perfil($_SESSION["user"]);
        
        $this->vista('profile',$resultado);
	
	}

	/************** Acciones Visualizaciones ********************* */

}