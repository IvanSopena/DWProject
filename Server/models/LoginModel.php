<?php

require('Server/models/SendMails.php');

class LoginModel
{

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
        
        if ($GLOBALS['sq']->getIsOpen() === true) {
            $GLOBALS['sq']->AppOpen($User, $Password);

            if ($GLOBALS['sq']->geterrors() == true) {

                $this->setError($GLOBALS['sq']->getClsLastError());
                $this->setType("error");
                $this->setView("login");
                return false;
            } else {

                    session_start();
                    $_SESSION["user"] = $User;

                    if ($GLOBALS['sq']->getMAppRol() == 1) {
                        $this->setView("usercover");
                    } else {
                        $this->setView("user");
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

    public function AddUser ($User,$Apellidos,$Email,$pass,$verifica){

        $pass = crypt($pass, strtoupper($Email)); 

        if ($GLOBALS['sq']->getIsOpen() === true) {
            
            $sql = ""; 

            $sql = "select count(Id) + 1 as id from " . $GLOBALS['sq']->getTableOwner() . ".users";
            $result = $GLOBALS['sq']->DB_Select($sql);
    
            if ($GLOBALS['sq']->fallo_query == true) {
    
                $this->setError("Fallo al buscar el id de la aplicación." . $GLOBALS['sq']->getDbLastSQL());
                $this->setType("error");
                $this->setView("register");
                return false;
                
            }else{
                $sql = "Insert into " . $GLOBALS['sq']->getTableOwner() . ".users (Id,Nombre,Apellidos,Email,password,primer_acceso,rol) " .
                " Values ('" .$result['id']. "','" .$User. "','" .$Apellidos. "','" .$Email. "','" .$pass. "','1','1' )";
        
                $GLOBALS['sq']->DB_Execute($sql);
                if ($GLOBALS['sq']->fallo_query == true) {
        
                    $this->setError($GLOBALS['sq']->getClsLastError() . $GLOBALS['sq']->getDbLastSQL());
                    $this->setType("error");
                    $this->setView("register");
                    return false;
                }else{
                    
                    $this->setView("usercover");
                    return true; 
                }
            }
        }else{
            $this->setError("Fallo de conexión con la base de datos.");
            $this->setType("error");
            $this->setView("register");
            return false;
        }
    }
 

    public function change_pass($Email){
        if ($GLOBALS['sq']->getIsOpen() === true) {
            $sql = ""; 

            $sql = "select email from " . $GLOBALS['sq']->getTableOwner() . ".users where email = '".$Email."'";
            $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == true) {
    
                $this->setError($GLOBALS['sq']->getClsLastError() . "----" . $GLOBALS['sq']->getDbLastSQL());
                $this->setType("error");
                $this->setView("restore");
                return;
                
            }else{
                ///enviar correo al usuario
                if($result['email'] === $Email ){

                    $new_pass = crypt("Temporal1", strtoupper($Email)); 

                    $send_mails = new SendMails();

                    $actualiza = "Update " . $GLOBALS['sq']->getTableOwner() . ".users set password = '". $new_pass ."' " .
                        "Where Email = '". $Email ."'";
                        $GLOBALS['sq']->DB_Execute($sql);
                        if ($GLOBALS['sq']->fallo_query == true) {
                
                            $this->setError($GLOBALS['sq']->getClsLastError() . $GLOBALS['sq']->getDbLastSQL());
                            $this->setType("error");
                            $this->setView("register");
                            return ;
                        }else{
                            $send_mails->send_new_password($Email,$new_pass);
                            $this->setError($send_mails->getErrorMail());
                            $this->setType($send_mails->getTypeMail());
                            $this->setView("restore");
                            return ; 
                        }
                }else{
                    $this->setError("Ups, el correo que has introducido no esta dado de alta en nuestros archivos.");
                    $this->setType("warning");
                    $this->setView("restore");
                }
                return;
            }
        }else{
            $this->setError("Fallo de conexión con la base de datos.");
            $this->setType("error");
            $this->setView("register");
            return;
        }
    }
}
