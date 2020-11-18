<?php

class ActionUsers
{

   public $perfil_result ="";
    
    public function __construct()
    {
        
    }

    function getPerfil()
    {
        return $this->perfil_result;
    }

    function setPerfil($data)
    {
        $this->perfil_result = $data;
    }

    public function buscar_favoritas()
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  al1.name,al1.cover,al1.sinopsis,al1.trailler,al1.details from " . $GLOBALS['sq']->getTableOwner() . ".Movies as al1, " . 
        $GLOBALS['sq']->getTableOwner() . ".UserMovie as al2 where al1.IdMovie = al2.IdMovie and al2.IdUser = ".$GLOBALS['sq']->getMAppUserId()." and al1.active = '1' limit 5";

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result;      
        }

    }

    public function cargaPelis($id,$limit)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  name,cover,sinopsis,trailler,details from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='".$id."' and active = '1' limit " . $limit;

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result ;      
        }
    }
   
    public function obtener_notificaciones()
    {
        $sql = "";
        $sql = "select  Count(IdNotify) as total from " . $GLOBALS['sq']->getTableOwner() . ".Notifications where Read_Message = '0' and IdUser ='".$GLOBALS['sq']->getMAppUserId()."'";
        $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == false) {

                return $result ;   
                
            } 
    }

    public function leer_notificaciones()
    {
        $sql = "";
        $sql = "select  CONCAT(Nombre,' ', Apellidos) as Usuario,Message from " . $GLOBALS['sq']->getTableOwner() . ".Notifications, " . $GLOBALS['sq']->getTableOwner() . ".Users
        where Id=IdUser and Read_Message = '0' and IdUser ='".$GLOBALS['sq']->getMAppUserId()."'";
        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

            if ($GLOBALS['sq']->fallo_query == false) {

                return $result ;   
                
            } 
    }

    public function obtener_perfil($User)
    {
        $sql = "";
        $sql = "select  Nombre,Apellidos,CONCAT(Nombre,' ', Apellidos) as Usuario,Email,password,foto,IFNULL(Nacimiento,'dd/mm/yyyy') as Nacimiento ,IFNULL(Pais,'') as Pais ,IFNULL(ProximoPago,'') as ProximoPago ,IFNULL(Plan,'') as Plan ,Dispositivos from " . $GLOBALS['sq']->getTableOwner() . ".Users where id= '" . $User . "'";
        $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error'] = "Fallo al buscar el usuario de la aplicación." . $GLOBALS['sq']->getDbLastSQL();
                $GLOBALS['type'] = "error";
               
                return;
            } 
            else 
            {

                $this->setPerfil($result);
            
                return;
            }
    }
}


