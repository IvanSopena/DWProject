<?php
require "Server/library/Controlador.php";
class Registro extends Controlador
{
    public function __construct()
	{

    }
    
    public function registrar()
	{

        $model = $this->modelo('LoginModel');

        $Nombre = $_POST["Nombre"];
        $Apellidos = $_POST["Apellidos"];
        $Email = $_POST["Email"];
        $password = $_POST["password"];
        $verifica = $_POST["verifica"];

        $model->AddUser($Nombre,$Apellidos,$Email,$password,$verifica);

        

        $this->vista($model->getView(), '');
	}
}