<?php

class ActionUsers
{

   
    /* private $sq; */
    //private $rstl = "";
    
    
    public function __construct()
    {
    }

   
    /* function getresultado()
    {
        return $this->$rstl;
    }

    function setresultado($rlt)
    {
        $this->$rstl = $rlt;
    } */





    public function buscar_favoritas()
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select al1.name,al1.cover,al1.sinopsis,al1.trailler,al1.details from " . $GLOBALS['sq']->getTableOwner() . ".Movies as al1, " . 
        $GLOBALS['sq']->getTableOwner() . ".UserMovie as al2 where al1.IdMovie = al2.IdMovie and al2.IdUser = ".$GLOBALS['sq']->getMAppUserId()." and al1.active = '1'";

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result;      
        }

    }

    public function cargaPelis($id)
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }

        $sql = "select name,cover,sinopsis,trailler,details from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='".$id."' and active = '1'";

        $result = $GLOBALS['sq']->DbSelect_tablas($sql);

        if ($GLOBALS['sq']->fallo_query == false) {

            //$this->setresultado($result);
            return $result ;      
        }
    }
   
}


