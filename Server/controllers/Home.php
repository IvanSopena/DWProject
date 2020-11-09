<?php
require "Server/library/Controlador.php";
class Home extends Controlador
{


	public function __construct()
	{
	}

	public function index()
	{
		$this->vista('login', '');
	}

	public function registro()
	{
		$this->vista('register', '');
	}

	public function reset_password()
	{
		$this->vista('restore', '');
	}
	
	/*public function login()
	{

		$model = $this->modelo('LoginModel');

		$user = $_POST["dni"];
		$pass = $_POST["password"];

		if (isset($_SESSION["user"])) {
			if ($model->OpenSession($user) === false) {
		
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				
			}
		} else {
			if ($model->login($user, $pass) === false) {
				
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				
			}
		}

		$this->vista($model->getView(), '');

		
	} */
}
