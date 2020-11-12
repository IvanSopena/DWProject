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
            $this->vista('usercover', '');
        }
        else{
            $this->vista('login', '');
        }
		
    }
    
    public function logoff()
	{
        session_start();
        // Eliminar todas las sesiones:
        session_unset();
        $GLOBALS['tipo'] = "info";
		$GLOBALS['error'] = "Hasta pronto";
        $this->vista('login', '');
        
	}
}

