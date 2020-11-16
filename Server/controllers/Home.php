<?php

class Home extends Controlador
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
			}
			else{
				if ($GLOBALS['sq']->getMAppRol() == 1) {
					$this->vista('usercover', '');
				} else {
					$this->vista('admin', '');
				}
			}

			$GLOBALS['sq']->DbClose();

		}
		else{
			$this->vista('login', '');
		}

	}
	

	public function registro()
	{
		$this->vista('register', '');
	}

	public function reset_password()
	{
		$this->vista('restore', '');
	}
	
	public function login()
	{
		$GLOBALS['sq']->connect_DB();
		$model = $this->modelo('LoginModel');

		$user = $_POST["mail_user"];
		$pass = $_POST["pass"];

		if (isset($_SESSION["user"])) {
			if ($model->OpenSession($user) === false) {

				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();	
			}
		} 
		else 
		{
			if ($model->login($user, $pass) === false) {
				
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				
			}
		}

		$this->vista($model->getView(), '');

		$GLOBALS['sq']->DbClose();	
	} 

	public function registrar_usuario()
	{
		$GLOBALS['sq']->connect_DB();
        $model = $this->modelo('LoginModel');

        $Nombre = $_POST["Nombre"];
        $Apellidos = $_POST["Apellidos"];
        $Email = $_POST["Email"];
        $password = $_POST["password"];
		$verifica = $_POST["verifica"];
		$leyes = isset($_POST["chcek"]);
	
        if($verifica === $password){
			if($leyes === true){
				if ( $model->AddUser($Nombre,$Apellidos,$Email,$password) === false) {
				
					$GLOBALS['tipo'] = $model->getType();
					$GLOBALS['error'] = $model->getError();
	
					$vista = $model->getView();
	
				}else{
					$vista = $model->getView();
				}
			}else{
				$GLOBALS['tipo'] = "warning";
				$GLOBALS['error'] = "Debe de aceptar las condiciones de uso para continuar.";
				$vista = "register";
			}
		}
		else
		{
			$GLOBALS['tipo'] = "error";
			$GLOBALS['error'] = "Las contraseñas qeu has introducido no son iguales. Por favor, intentalo de nuevo.";
			$vista = "register";
		}

		$this->vista($vista, '');
		$GLOBALS['sq']->DbClose();
	}

	public function cambiar_pass()
	{
		$GLOBALS['sq']->connect_DB();
        $model = $this->modelo('SendMails');

		$Email = $_POST["email"];
		
		$sql = "Select Email from " . $GLOBALS['sq']->getTableOwner() . ".Users where Email = '". $Email . "'";

		$result = $GLOBALS['sq']->DB_Select($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

            $GLOBALS['error'] ="Error al restaurar su contraseña.Pongase en contacto con el servicio tecnico 900123456";
            $GLOBALS['tipo'] ="error";
            $this->vista('restore', '');
					$GLOBALS['sq']->DbClose();
		} 
		else
		{
			$verificaMail = "".$result['Email'];
			if($verificaMail === ""){
				$GLOBALS['error'] ="El correo intoducido no esta dado de alta el en sistema de Streaming Movies";
				$GLOBALS['tipo'] ="error";
				$this->vista('restore', '');
					$GLOBALS['sq']->DbClose();
				return;
			}

			$pass = crypt("Temporal1", strtoupper($verificaMail)); 


			$sql = "Update " . $GLOBALS['sq']->getTableOwner() . ".Users set password = '".$pass."'";
           	$sql = $sql. " where Email = '". $verificaMail ."'";

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error'] ="Error al restaurar su contraseña.Pongase en contacto con el servicio tecnico 900123456";
				$GLOBALS['tipo'] ="error";
				$this->vista('restore', '');
					$GLOBALS['sq']->DbClose();
					return;
            } 
            else{
				if ($model->send_new_password ($verificaMail,$pass) === false)
				{
					$GLOBALS['error'] =$model->getErrorMail();
					$GLOBALS['tipo'] =$model->getTypeMail();
					$this->vista('restore', '');
					$GLOBALS['sq']->DbClose();
					return;
				}
				else
				{
					$GLOBALS['error'] ="Contraseña restaurada, Su nueva contraseña esta en camino, revise su correo";
					$GLOBALS['tipo'] ="ok";
					$this->vista('restore', '');
					$GLOBALS['sq']->DbClose();
					return;
				}
            }	
		}
		
	}
}

