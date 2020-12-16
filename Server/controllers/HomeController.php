<?php

class HomeController extends Controlador
{


	public function __construct()
	{
	}

	public function index()
	{
		session_start();
		
		if (isset($_SESSION["user"])) 
		{
			$GLOBALS['sq']->refrescar_credenciales($_SESSION["user"]);
			$this->vista('main', '');
		}
		else{
			$this->vista('login', '');
		}

		
	}
	
	public function login()
	{
		$model = $this->modelo('LoginModel');
		$user = $_POST["email"];
		$pass = $_POST["pass"];

		$model->login($user, $pass) === false;
		
		$this->vista($model->getView(), '');
		
		$GLOBALS['sq']->DbClose();	
	}

	public function logoff()
	{
		session_start();
        session_unset();
        $GLOBALS['type'] = "info";
		$GLOBALS['error'] = "Sesion cerrada con exito.";
		$this->vista('login', '');
		$GLOBALS['sq']->DbClose();	
    }

    public function registro()
	{
		$this->vista('register', '');
    }
    
    public function registrar_usuario()
	{


		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
            // Google reCAPTCHA API secret key 
            $secretKey = $GLOBALS["secretKey"]; 
             
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 

			// Decode json data 
			$responseData = json_decode($verifyResponse); 
			
			// If reCAPTCHA response is valid 
            if($responseData->success){ 
				$model = $this->modelo('LoginModel');

				$Nombre = $_POST["Nombre"];
				$Apellidos = $_POST["Apellidos"];
				$Email = $_POST["Email"];
				$password = $_POST["password"];
				
				if ( $model->AddUser($Nombre,$Apellidos,$Email,$password) === false) {
					$vista = $model->getView();
				}else{
					$perfil = $this->modelo('UserModel');
					$datos_recibidos = $perfil->obtener_perfil($_SESSION["user"]);
					$this->vista('profile',$datos_recibidos);
				}
			}
			else{ 
				
				$GLOBALS['error']="Varificación fallida. Por favor prueba de nuevo. ";
				$GLOBALS['type']="error";
				$this->vista('register', '');
            } 


		}
		else{ 
			
			$GLOBALS['error']="Por favor, debe verificar reCAPTCHA.";
			$GLOBALS['type']="warning";
			$this->vista('register', '');
        } 

	
	}

	public function reset_password()
	{
		$this->vista('restore', '');
	}

	public function cambiar_pass()
	{
		$GLOBALS['sq']->connect_DB();
		$usersModel = $this->modelo('UserModel');
        $model = $this->modelo('SendMails');

		$Email = $_POST["email"];
		
		if ($usersModel->obtener_mail($Email) === false){
			$this->vista('restore', '');
		}
		else{
			if ($usersModel->guardar_pass($Email) === false){
				$this->vista('restore', '');
			}
			else{
				$model->send_new_password ($Email,"Temporal1");
				
				$this->vista('restore', '');		
			}
		}	
	}
}