<?php

class LoginModel
{

    /* private $sq; */
    private $Error;
    private $Type;
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


    function getError()
    {
        return $this->Error;
    }

    function setError($err)
    {
        $this->Error = $err;
    }

    function getType()
    {
        return $this->Type;
    }

    function setType($type)
    {
        $this->Type = $type;
    }

    public function login($User, $Password)
    {
        
        if ($GLOBALS['sq']->getIsOpen() === true) 
        {
            $GLOBALS['sq']->AppOpen($User, $Password);

            if ($GLOBALS['sq']->geterrors() == true) {

                $this->setError($GLOBALS['sq']->geterror_login());
                $this->setType("error");
                $this->setView("login");
                return false;
            } 
            else 
            {
                    session_start();

                    $_SESSION["user"] = $GLOBALS['sq']->getMAppUserId();

                    if ($GLOBALS['sq']->getMAppRol() == 1) {
                        $this->setView("usercover");
                    } else {
                        $this->setView("register");
                    }

                    return true;
            }

        } else {
            $this->setError($GLOBALS['sq']->getClsLastError());
            $this->setType("error");
            $this->setView("login");
            return false;
        }
    }

     public function OpenSession($id)
    {
        if ($GLOBALS['sq']->getIsOpen() === true) {
            
            $sentencia = "";

            $sentencia = "select  Email,password, CONCAT(Nombre,' ', Apellidos) as Usuario , Id, rol,foto from " . $GLOBALS['sq']->getTableOwner() . ".Users where id= '" . $id . "'";

            $result = $GLOBALS['sq']->DB_Select($sentencia);

            if ($GLOBALS['sq']->fallo_query == true) {

                $this->setError("Fallo al buscar el usuario de la aplicación." . $GLOBALS['sq']->getDbLastSQL());
                $this->setType("error");
                $this->setView("login");
                return false;
            } 
            else 
            {

                $GLOBALS['sq']->setMAppUserName($result['Email']);
                $GLOBALS['sq']->setMAppUserPwd($result['password']);
                $GLOBALS['sq']->setMRealUserName($result['Usuario']);
                $GLOBALS['sq']->setMAppUserId($result['Id']);
                $GLOBALS['sq']->setMAppRol($result['rol']);
            
                $GLOBALS['sq']->setfoto($result['foto']);  
           

                return true;
            }
        } 
        else 
        {
            $this->setError($GLOBALS['sq']->getClsLastError());
            $this->setType("error");
            $this->setView("login");
            return false;
        }
    } 

    public function AddUser($Nombre,$Apellidos,$Email,$password)
    {
        $password = crypt($password, strtoupper($Email));

        $sql = "";

        $sql = "Select max(id) +1 as id from " . $GLOBALS['sq']->getTableOwner() . ".Users";
        $result = $GLOBALS['sq']->DB_Select($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

            $this->setError("Fallo al generar el nuevo usuario de la aplicación. " . $GLOBALS['sq']->getDbLastSQL());
            $this->setType("error");
            $this->setView("register");
            return false;
        } 
        else
        {
            $Id = $result['id'];
            $sql = "Insert into " . $GLOBALS['sq']->getTableOwner() . ".Users (Id,Nombre,Apellidos,Email,password,rol,foto) ";
            $sql = $sql. "Values('". $Id ."','". $Nombre ."','". $Apellidos ."','". $Email ."','". $password ."','1','no_photo.jpg')";

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $this->setError("Fallo al generar el nuevo usuario de la aplicación. " . $GLOBALS['sq']->getDbLastSQL());
                $this->setType("error");
                $this->setView("register");
                return false;
            } 
            else{
                $this->setView("usercover");
            }

        }
       
    }
}
