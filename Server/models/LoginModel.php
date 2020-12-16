<?php

class LoginModel
{
    
    private $View;

    public function __construct()
    {
    }

    function getView()
    {
        return $this->View;
    }

    function setView($view)
    {
        $this->View = $view;
    }

    public function login($User, $Password)
    {
        
        try
        {
            if ($GLOBALS['sq']->getIsOpen() === true) 
            {
            $GLOBALS['sq']->AppOpen($User, $Password);

            if ($GLOBALS['sq']->geterrors() == true) {
                $GLOBALS['error']= $GLOBALS['sq']->getClsLastError();
                $GLOBALS['type']="warning";

                $this->setView("login");
                return;
            } 
            else 
            {
                
                session_start();
                $_SESSION["user"] = $GLOBALS['sq']->getMAppUserId(); 
                    
                $this->setView("main");
                return;
            }

            } else {
                $GLOBALS['error']= "Error de conexión: ".$GLOBALS['sq']->getClsLastError();
                $GLOBALS['type']="error";
                $this->setView("login");
                return;
            }
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            $this->setView("login");
            return;
        }
    }

    public function AddUser($Nombre,$Apellidos,$Email,$password)
    {
        try{
            $password = $GLOBALS['security']->crypt($password, strtoupper($Email)); 

            $sql = "";

            $sql = "Select max(id) +1 as id from " . $GLOBALS['sq']->getTableOwner() . ".Users";
            $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error']="Fallo al generar el nuevo usuario de la aplicación. ";
                $GLOBALS['type']="error";
                $this->setView("register");
                return false;
            } 
            else
            {
                $Id = $result['id'];
                $sql = "Insert into " . $GLOBALS['sq']->getTableOwner() . ".Users (Id,Nombre,Apellidos,Email,password,rol,foto,Activo) ";
                $sql = $sql. "Values('". $Id ."','". $Nombre ."','". $Apellidos ."','". $Email ."','". $password ."','1','no_photo.jpg','1')";

                $GLOBALS['sq']->DB_Execute($sql);

                if ($GLOBALS['sq']->fallo_query == true) {

                    $GLOBALS['error']="Fallo al generar el nuevo usuario de la aplicación. ";
                    $GLOBALS['type']="error";
                    $this->setView("register");
                    return false;
                } 
                else{

                    session_start();

                    $_SESSION["user"] = $Id;

                    $GLOBALS['sq']->setMAppUserName($Email);
                    $GLOBALS['sq']->setMAppUserPwd($password);
                    $GLOBALS['sq']->setMRealUserName($Nombre ." ". $Apellidos);
                    $GLOBALS['sq']->setMAppUserId($Id);
                    $GLOBALS['sq']->setfoto("no_photo.jpg");  
                    return true;
                }
            }
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return false;
        }
       
    }

}