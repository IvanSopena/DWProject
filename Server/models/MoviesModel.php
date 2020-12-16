<?php

class MoviesModel
{

    public function __construct()
    {
    }

    public function Carga_Pelis($id,$limit)
    {
       try{
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

    public function Carga_Favoritas($limite)
    {
        try{
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
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function carga_por_categoria($id,$tipo)
    {
        try{
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
        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function BuscarPelis($info)
    {
       try
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

        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
    }

    public function pelicula_para_ver($id){
        
        try{
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

        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
   }

   public function cargaPelisIguales($id,$cat)
   {
      try{
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }
 
        $sql = "select  idmovie,name,cover,sinopsis,trailler,details,duration,age from " . $GLOBALS['sq']->getTableOwner() . ".Movies where cat ='".$cat."'  
        and idmovie NOT IN ('".$id."') and  active = '1'";
 
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

   public function agrega_favorita($user,$movie)
   {
     try
     {
            $sql ="";

            $sql = "Select count(IdMovie) as peli from " . $GLOBALS['sq']->getTableOwner() . ".UserMovie where IdMovie = '".$movie."' and IdUser = '".$user."'";
            $result = $GLOBALS['sq']->DB_Select($sql);
    
            if ($GLOBALS['sq']->fallo_query == false) {
    
                if($result["peli"] != "0")
                {
                    $GLOBALS['error']="Esta pelicula ya esta en tus favoritos";
                    $GLOBALS['type']="warning";
                    return;
                }
    
            } 
    
            $sql = "Insert into " . $GLOBALS['sq']->getTableOwner() . ".UserMovie (IdUser,IdMovie) ";
            $sql = $sql. "Values('". $user ."','". $movie ."')";
    
            $GLOBALS['sq']->DB_Execute($sql);
    
            if ($GLOBALS['sq']->fallo_query == true) {
    
                $GLOBALS['error']="Fallo al agregar la pelicua a favoritos. ";
                $GLOBALS['type']="error";
                
            } 
            else{
    
                $GLOBALS['error']="Ya tienes una nueva pelicula favorita";
                $GLOBALS['type']="success";
                
            }
            return;
     }

       catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
       
   }

   public function borrar_favorita($user,$movie)
    {
       try{

            $sql ="";

            $sql = "delete from " . $GLOBALS['sq']->getTableOwner() . ".UserMovie ";
            $sql = $sql. "where iduser = '". $user ."' and idmovie = '". $movie ."'";

            $GLOBALS['sq']->DB_Execute($sql);

            if ($GLOBALS['sq']->fallo_query == true) {

                $GLOBALS['error']="Fallo al eliminar la pelicua a favoritos. ";
                $GLOBALS['type']="error"; 
            } 
            else{

                $GLOBALS['error']="Pelicula elimanda correctamente";
                $GLOBALS['type']="success";
                
            }
            return;
       }

        catch(Exception $ex)
        {
            $GLOBALS['error']= $ex->getmessage();
            $GLOBALS['type']="warning";
            return;
        }
       
        
    }

   
}