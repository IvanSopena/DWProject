<?php

class ActionsUser
{
 
    private $info;

    function getresultado(){
        return $this->info;
    }
    function setresultado($setinfo){
        $this->info = $setinfo;
    }
 
    public function buscar_novedades()
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }
      
        $sql = "select name,cover,sinopsis,trailler,details from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='1' and active = '1'";
        $result = $GLOBALS['sq']->DbSelect_tablas($sql);
    
        if ($GLOBALS['sq']->fallo_query == false) {
    
            $this->setresultado($result);
            return ;      
        }

        $GLOBALS['sq']->DbClose();
    }

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
    
            $this->setresultado($result);
            return ;      
        }

        $GLOBALS['sq']->DbClose();
    }

    public function buscar_estrenos()
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }
      
        $sql = "select name,cover,sinopsis,trailler,details from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='2' and active = '1'";
        $result = $GLOBALS['sq']->DbSelect_tablas($sql);
        
        $result = $GLOBALS['sq']->DbSelect_tablas($sql);
    
        if ($GLOBALS['sq']->fallo_query == false) {
    
            $this->setresultado($result);
            return ;      
        }

        $GLOBALS['sq']->DbClose();
    }

    public function buscar_top()
    {
        $sql = ""; 
        if ($GLOBALS['sq']->getIsOpen() === false) {
            $GLOBALS['sq']->connect_DB();
        }
      
        $sql = "select name,cover,sinopsis,trailler,details from " . $GLOBALS['sq']->getTableOwner() . ".Movies where status ='3' and active = '1'";
     