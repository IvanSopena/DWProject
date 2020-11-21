<?php


class Cover extends Controlador
{

    public function __construct()
	{
	}

    public function index()
	{
        session_start();
		if (isset($_SESSION["user"])) {

			$GLOBALS['sq']->connect_DB();
			$model = $this->modelo('LoginModel');

			if ($model->opensession($_SESSION["user"]) === false) {

				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				$this->vista('login', '');
				
				$GLOBALS['sq']->DbClose();
			}
			else{
				if ($GLOBALS['sq']->getMAppRol() == 1) {
					$this->vista('usercover', '');
				
					$GLOBALS['sq']->DbClose();
				} else {
					$this->vista('admin', '');
					
					$GLOBALS['sq']->DbClose();
				}
			}
		}
		else{
			$this->vista('login', '');
			$GLOBALS['sq']->DbClose();
		}
		
    }
    
    public function logoff()
	{
        session_start();
        // Eliminar todas las sesiones:
        session_unset();
        $GLOBALS['tipo'] = "info";
		$GLOBALS['error'] = "Has cerrado sesión correctamente. Hasta pronto!!";
        $this->vista('login', '');
        
	}

	public function perfil()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('LoginModel');
		$perfil = $this->modelo('ActionUsers');
		
		if (isset($_SESSION["user"])) {
			if ($model->opensession($_SESSION["user"]) === true) {
				$datos_recibidos = $perfil->obtener_perfil($_SESSION["user"]);
				//$GLOBALS['error'] = "";
				$this->vista('profile',$datos_recibidos);
			}
			else{

				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				$this->vista('usercover', '');
				
				$GLOBALS['sq']->DbClose();
			}
		}
		
	}

	public function update()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('ActionUsers');
		$model1 = $this->modelo('LoginModel');
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
			$model1->opensession($_SESSION["user"]);
			$Foto = $GLOBALS['sq']->getfoto();
		}

		if($plan==="0"){
			$GLOBALS['tipo'] = "info";
			$GLOBALS['error'] = "Debes seleccionar un plan antes de poder actualizar tu perfil.";
			
		}
		else
		{
			if($model->EditProfile($Foto,$Nombre,$Apellidos,$Email,$password,$fecha,$pais,$plan,$_SESSION["user"])===true)
			{
				$GLOBALS['tipo'] = "success";
				$GLOBALS['error'] = "Tu perfil se ha actualizado correctamente.";
				
			}else{
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				$GLOBALS['sq']->DbClose();
				
			}
		}
	}

	public function delete()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('ActionUsers');
		session_start();
		
		 if($model->BorrarPerfil($_SESSION["user"])===true)
			{
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				session_unset();
				$this->vista('login', '');
				
			}else{
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				$this->perfil();
				$GLOBALS['sq']->DbClose();
				
			}

	}

	public function ver_pelicula()
    {
        $GLOBALS['sq']->connect_DB();
		$model = $this->modelo('ActionUsers');
		session_start();
		$triller = $model->pelicula_para_ver($_GET["id"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewer', $triller);
	}
	

	public function agregar_pelicula()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('ActionUsers');
		session_start();
		$model->agrega_favorita($_GET["id"],$_GET["mov"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);

		$GLOBALS['tipo'] = $model->getType();
		$GLOBALS['error'] = $model->getError();

		$this->vista('usercover', '');
	}

	public function borrar_pelicula()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('ActionUsers');
		session_start();
		$model->borrar_favorita($_GET["id"],$_GET["mov"]);
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);

		$GLOBALS['tipo'] = $model->getType();
		$GLOBALS['error'] = $model->getError();

		$this->vista('viewall', 'fav');
	}


	public function vertodas()
	{

		session_start();
		$GLOBALS['sq']->connect_DB();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewall', $_GET["id"]);
	}

	public function buscar()
	{

		session_start();
		$GLOBALS['sq']->connect_DB();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('viewall', $_POST["busqueda"]);
	}

	public function movies()
	{

		session_start();
		$GLOBALS['sq']->connect_DB();
		$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
		$this->vista('movies', '');
	}
}

