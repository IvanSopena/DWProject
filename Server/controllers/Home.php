<?php


class Home extends Controlador
{

	public function __construct()
	{
	}

	public function index()
	{
		$this->vista('login', '');
	}

	public function registrarse()
	{
		$this->vista('register', '');
	}

	public function registrar()
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
				if ( $model->AddUser($Nombre,$Apellidos,$Email,$password,$verifica) === false) {
				
					$GLOBALS['tipo'] = $model->getType();
					$GLOBALS['error'] = $model->getError();
	
					$vista = $model->getView();
	
				}else{
					$vista = $model->getView();
				}
			}else{
				$GLOBALS['tipo'] = "info";
				$GLOBALS['error'] = "Debe de aceptar las condiciones de uso para continuar.";
				$vista = "register";
			} 
        }else{

            $GLOBALS['tipo'] = "error";
            $GLOBALS['error'] = "Las contraseñas no coinciden";
            $vista = "register";
        }
       

		$this->vista($vista, '');
		
		$GLOBALS['sq']->DbClose();
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
		} else {
			if ($model->login($user, $pass) === false) {
				
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();	
			 }/*else{
				$foto = "/public/img/users/". $GLOBALS['sq']->getPrimeraConexion(); 
			} */
		}

		$this->vista($model->getView(), '');

		$GLOBALS['sq']->DbClose();
		
	} 

	public function reset_password()
	{
		$this->vista('restore', '');
	}

	public function change_pass(){
	
		$Email = $_POST["email"];
		 $GLOBALS['sq']->connect_DB();
		$model = $this->modelo('LoginModel');

		$model->change_pass($Email); 
				
		$GLOBALS['tipo'] = $model->getType();
		$GLOBALS['error'] = $model->getError();

		$vista = $model->getView();


		$this->vista($vista, '');
		$GLOBALS['sq']->DbClose(); 
	}
}
