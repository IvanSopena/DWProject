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
        
        if ($GLOBALS['sq']->getIsOpen() === true) {
            $GLOBALS['sq']->AppOpen($User, $Password);

            if ($GLOBALS['sq']->geterrors() == true) {

                $this->setError($GLOBALS['sq']->geterror_login());
                $this->setType("error");
                $this->setView("login");
                return false;
            } else {

                if ($GLOBALS['sq']->getprimeraConexion() == true) {
                    $this->setView("restore");
                } else {

                    session_start();

                    $_SESSION["user"] = $User;

                    if ($GLOBALS['sq']->getMAppRol() == 1) {
                        $this->setView("admin");
                    } else {
                        $this->setView("user");
                    }
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

    }
 /*    public function OpenSession($user)
    {
        if ($GLOBALS['sq']->getIsOpen() === true) {
            $GLOBALS['sq']->OpenSession($user);

            if ($GLOBALS['sq']->geterrors() == true) {
                $this->setView("login");
            } else {
                if ($GLOBALS['sq']->getMAppRol() == 1) {
                    $this->setView("selectsession");
                } else {
                    $this->setView("user");
                }
            }

            return true;
        } else {
            $this->setError($GLOBALS['sq']->getClsLastError());
            $this->setType("error");
            $this->setView("login");
            return false;
        }
    } */
}
