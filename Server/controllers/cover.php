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
		session_start();
		if (isset($_SESSION["user"])) {
			if ($model->opensession($_SESSION["user"]) === true) {
				$this->vista('profile', '');
			}
			else{
				$GLOBALS['tipo'] = $model->getType();
				$GLOBALS['error'] = $model->getError();
				$this->vista('login', '');
				
				$GLOBALS['sq']->DbClose();
			}
		}
		
	}
}

