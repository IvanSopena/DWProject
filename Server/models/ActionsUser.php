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

		
		}
		else{
			$this->vista('login', '');
		}
       
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
				$vis