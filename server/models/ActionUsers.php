<?php

class ActionUsers
{

   public $perfil_result ="";
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
    function getPerfil()
    {
        return $this->perfil_result;
    }

    function setPerfil($data)
    {
        $this->perfil_result = $data;
    }

    public function buscar_favoritas($limite)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  al1.idmovie,al1.cat,al1.name,al1.cover,al1.sinopsis,al1.trailler,al1.details,al1.duration,al1.age from " . $GLOBALS['sq']->getTableOwner() . ".Movies as al1, " . 
        $GLOBALS['sq']->getTableOwner() . ".UserMovie as al2 where al1.IdMovie = al2.IdMovie and al2.IdUser = ".$GLOBALS['sq']->getMAppUserId()." and al1.active = '1' ";

        if($limite===true){
            $sql = $sql . "limit 5";
        }

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result;      
        }

    }

   public function pelicula_para_ver($id){
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  al1.idmovie,al1.name,al1.cat,al2.catdesc,al1.sinopsis,al1.trailler,al1.duration,al1.age from " . $GLOBALS['sq']->getTableOwner() . ".Movies as al1, " . 
        $GLOBALS['sq']->getTableOwner() . ".CategoryMovie as al2 where al1.cat = al2.Idcat and al1.idmovie = '".$id."'";

        $result = $GLOBALS['sq']->DB_Select($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            return $result ;      
        }
   }

    public function cargaPelis($id,$limit)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  idmovie,cat,name,cover,sinopsis,trailler,details,duration,age from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='".$id."' and active = '1' ";

        if($limit>0){
            $sql = $sql . " limit " . $limit;
        }

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result ;      
        }
    }
  
    public function cargaPelisIguales($id,$cat)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  idmovie,name,cover,sinopsis,trailler,details,duration,age from " . $GLOBALS['sq']->getTableOwner() . ".Movies where cat ='".$cat."'  
        and idmovie NOT IN ('".$id."') and  active = '1'";

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result ;      
        }
    }

    public function carga_por_categoria($id,$tipo)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  idmovie,cat,name,cover,sinopsis,trailler,details,duration,age from " . $GLOBALS['sq']->getTableOwner() . ".Movies where type = '".$tipo."' and cat ='".$id."' and active = '1' ";

        
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
        $sql = "select  Nombre,Apellidos,CONCAT(Nombre,' ', Apellidos) as Usuario,Email,password,foto,IFNULL(Nacimiento,'') as Nacimiento ,IFNULL(Pais,'') as Pais ,IFNULL(Plan,'0') as Plan ,Dispositivos from " . $GLOBALS['sq']->getTableOwner() . ".Users where id= '" . $User . "'";
        $result = $GLOBALS['sq']->DB_Select($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error'] = "Fallo al buscar el usuario de la aplicación." . $GLOBALS['sq']->getDbLastSQL();
                $GLOBALS['type'] = "error";
               
                return;
            } 
            else 
            {
                $GLOBALS['sq']->setfoto($result['foto']);
                //$this->setPerfil($result);
            
                return $result;
            }
    }

    public function EditProfile($Foto,$Nombre,$Apellidos,$Email,$password,$fecha,$pais,$plan,$id)
    {
        $sql="";

        $sql = "Update " . $GLOBALS['sq']->getTableOwner() . ".Users set Nombre = '".$Nombre."',Apellidos = '".$Apellidos."',Email = '".$Email."',";
        $sql = $sql. " password = '".$password."',foto = '".$Foto."',Nacimiento = '".$fecha."',Pais = '".$pais."',Plan = '".$plan."',Dispositivos = '1'";
        $sql = $sql. " where id = '". $id ."'";

        $GLOBALS['sq']->DB_Execute($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

            $this->setError("Error al actualizar tu perfil. " . $GLOBALS['sq']->getDbLastSQL());
            $this->setType("error");
            
            return false;
        } 
        else{
            return true;
        }
    }

    public function BorrarPerfil($User)
    {
        $sql="";

        $sql = "delete from " . $GLOBALS['sq']->getTableOwner() . ".Users where id = '". $User ."'";
       

        $GLOBALS['sq']->DB_Execute($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

            $this->setError("Error al eliminar la suscripcion, ponte en contacto con el administador en el 900123456. " . $GLOBALS['sq']->getDbLastSQL());
            $this->setType("error");
            
            return false;
        } 
        else{
            $this->setError("Perfil eliminado.Esperamos que vuelvas pronto");
            $this->setType("info");
            $this->setView("login");
            return true;
        }
    } 

    public function agrega_favorita($user,$movie)
    {
        $sql ="";

        $sql = "Select count(IdMovie) as peli from " . $GLOBALS['sq']->getTableOwner() . ".UserMovie where IdMovie = '".$movie."' and IdUser = '".$user."'";
        $result = $GLOBALS['sq']->DB_Select($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            if($result["peli"] != "0")
            {
                $this->setError("Esta pelicula ya esta en tus favoritos");
                $this->setType("warning");
                return;
            }

        } 

        $sql = "Insert into " . $GLOBALS['sq']->getTableOwner() . ".UserMovie (IdUser,IdMovie) ";
        $sql = $sql. "Values('". $user ."','". $movie ."')";

        $GLOBALS['sq']->DB_Execute($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

                $this->setError("Fallo al agregar la pelicua a favoritos. ");
                $this->setType("error");
               
        } 
        else{

            $this->setError("Ya tienes una nueva pelicula favorita");
            $this->setType("ok");
            
        }
        return;
        
    }

    public function borrar_favorita($user,$movie)
    {
        $sql ="";

        $sql = "delete from " . $GLOBALS['sq']->getTableOwner() . ".UserMovie ";
        $sql = $sql. "where iduser = '". $user ."' and idmovie = '". $movie ."'";

        $GLOBALS['sq']->DB_Execute($sql);

        if ($GLOBALS['sq']->fallo_query == true) {

                $this->setError("Fallo al eliminar la pelicua a favoritos. ");
                $this->setType("error"); 
        } 
        else{

            $this->setError("Pelicula elimanda correctamente");
            $this->setType("ok");
            
        }
        return;
        
    }

    public function BuscarPelis($info)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select  idmovie,cat,name,cover,sinopsis,trailler,details,duration,age from " . $GLOBALS['sq']->getTableOwner() . ".Movies where name like '%".$info."%'";

        

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result ;      
        }
    }
}


