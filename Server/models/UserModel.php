<?php

class UserModel
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

    public function obtener_perfil($User)
    {

        try
        {
            $sql = "";
            $sql = "select  Nombre,Apellidos,CONCAT(Nombre,' ', Apellidos) as Usuario,Email,password,foto,IFNULL(Nacimiento,'') as Nacimiento ,IFNULL(Pais,'') as Pais ,IFNULL(Plan,'0') as Plan ,Dispositivos from " . $GLOBALS['sq']->getTableOwner() . ".Users where id= '" . $User . "'";
            $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error'] = "Fallo al buscar el usuario de la aplicación.";
                $GLOBALS['type'] = "error";
                
                return;
            } 
            else 
            {
                $GLOBALS['sq']->setfoto($result['foto']);
                    
                return $result;
            }
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function leer_notificaciones()
    {
        try{
            $sql = "";
            $sql = "select  IdNotify, CONCAT(Nombre,' ', Apellidos) as Usuario,Message from " . $GLOBALS['sq']->getTableOwner() . ".Notifications, " . $GLOBALS['sq']->getTableOwner() . ".Users
            where Id=IdUser and Read_Message = '0' and IdUser ='".$GLOBALS['sq']->getMAppUserId()."'";
            $result = $GLOBALS['sq']->DbSelect_tablas($sql);

            if ($GLOBALS['sq']->fallo_query == false) {

                return $result ;   
                
            } 
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function obtener_notificaciones()
    {
        try
        {
            $sql = "";
            $sql = "select  Count(IdNotify) as total from " . $GLOBALS['sq']->getTableOwner() . ".Notifications where Read_Message = '0' and IdUser ='".$GLOBALS['sq']->getMAppUserId()."'";
            $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == false) {

                return $result ;   
                
            }
        } 
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function quitar_notificacion($notificacion)
    {
        try{
            $sql="";

            $sql = "Update " . $GLOBALS['sq']->getTableOwner() . ".Notifications set Read_Message = '1'";
            $sql = $sql. " where IdNotify = '". $notificacion ."'";
    
            $GLOBALS['sq']->DB_Execute($sql);
    
            if ($GLOBALS['sq']->fallo_query == true) {
    
                $GLOBALS['error']= "Error en la actualización, por favor vuelva a intentarlo ";
                $GLOBALS['type']="warning";
                
                return;
            } 
           
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function obtener_mail($Email){

        try{
            $sql = "Select Email from " . $GLOBALS['sq']->getTableOwner() . ".Users where Email = '". $Email . "'";
            $result = $GLOBALS['sq']->DB_Select($sql);
            
            if ($GLOBALS['sq']->fallo_query == true) {
    
                $GLOBALS['error'] ="Error al restaurar su contraseña.Pongase en contacto con el servicio tecnico 900123456";
                $GLOBALS['type'] ="error";
                return false;
            } 
            else{
                $verificaMail = "".$result['Email'];
                if($verificaMail === ""){
                    $GLOBALS['error'] ="El correo intoducido no esta dado de alta el en sistema de Streaming Movies";
                    $GLOBALS['type'] ="error";
                    
                    return false;
                }
            }
            return true;
        }
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return false;
        }
    }

    public function guardar_pass($Email){

        try{
            $pass = $GLOBALS['security']-> crypt("Temporal1",strtoupper($Email));
        
            $sql = "Update " . $GLOBALS['sq']->getTableOwner() . ".Users set password = '".$pass."'";
            $sql = $sql. " where Email = '". $Email ."'";

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error'] ="Error al restaurar su contraseña.Pongase en contacto con el servicio tecnico 900123456";
                $GLOBALS['type'] ="error";
                    
                return false;
            } 
            else{
                return true;
            }
        }

        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return false;
        }
    }

    public function BorrarPerfil($User)
    {
        try{
            $sql="";

            $sql = "delete from " . $GLOBALS['sq']->getTableOwner() . ".Users where id = '". $User ."'";
        

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error']="Error al eliminar la suscripcion, ponte en contacto con el administador en el 900123456. ";
                $GLOBALS['type']=("error");
                
                return false;
            } 
            else{
                $GLOBALS['error']="Perfil eliminado.Esperamos que vuelvas pronto";
                $GLOBALS['type']=("info");
                $this->setView("login");
                return true;
            }
        }

        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return false;
        }
    } 

    public function EditProfile($Foto,$Nombre,$Apellidos,$Email,$password,$fecha,$pais,$plan,$id)
    {
        try{
            $sql="";

            $sql = "Update " . $GLOBALS['sq']->getTableOwner() . ".Users set Nombre = '".$Nombre."',Apellidos = '".$Apellidos."',Email = '".$Email."',";
            $sql = $sql. " password = '".$password."',foto = '".$Foto."',Nacimiento = '".$fecha."',Pais = '".$pais."',Plan = '".$plan."',Dispositivos = '1'";
            $sql = $sql. " where id = '". $id ."'";

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error']="Error al actualizar tu perfil. ";
                $GLOBALS['type']="error";
                
            } 
            else{
                $GLOBALS['type'] = "success";
                $GLOBALS['error'] = "Tu perfil se ha actualizado correctamente.";
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