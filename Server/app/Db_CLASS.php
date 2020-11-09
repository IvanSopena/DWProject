<?php

/*
 * @author Ivan Sopeña
 * 
 * Esta clase es la que va a contener la 
 * conexion con la base de datos asi como
 * las consultas y demas acciones que se realicen con ella.
 */

//Incluimos el fichero de configuración para tener acceso a las varibles de configuración
//require("Server/config/Config.php");

class Db_CLASS {

    //Definimos las variables que va a necesitar la clase.
    public $ClsLastError;
    public $IsOpen;
    public $DbLastSQL;
    private $Connect_DB;
    public $TableOwner;
    private $OpenTrans;
    public $resultado;
    public $fallo_query;

    //Creamos el constructor de la clase
    function __construct() {

        $this->ClsLastError = "";
        $this->IsOpen = false;
        $this->DbLastSQL = "";
        $this->TableOwner = "";
        $this->OpenTrans = 0;
        $this->fallo_query = false;
    }

    ///-----------------------------------------------------Creamos los getters y Setters de las variables------------------------------------------


    function getClsLastError() {
        return $this->ClsLastError;
    }

    function getIsOpen() {
        return $this->IsOpen;
    }

    function getDbLastSQL() {
        return $this->DbLastSQL;
    }

    function getTableOwner() {
        return $this->TableOwner;
    }

    function getOpenTrans() {
        return $this->OpenTrans;
    }

    function setClsLastError($ClsLastError) {
        $this->ClsLastError = $ClsLastError;
    }

    function setIsOpen($IsOpen) {
        $this->IsOpen = $IsOpen;
    }

    function setDbLastSQL($DbLastSQL) {
        $this->DbLastSQL = $DbLastSQL;
    }

    function setTableOwner($TableOwner) {
        $this->TableOwner = $TableOwner;
    }

    function setOpenTrans($OpenTrans) {
        $this->OpenTrans = $OpenTrans;
    }

    ///-----------------------------------------------------Creamos los atributos que va a conetener nuestra clase------------------------------------------

    public function connect_DB() {

        try {

            $this->Connect_DB = new PDO('mysql:host=' . DB_Server . '; dbname=' . DB_Schema, DB_User, DB_Password);

            $this->Connect_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->setIsOpen(true);
            
            $this->setTableOwner(DB_Schema);
            
            return $this->Connect_DB;
            
        } catch (Exception $ex) {
            $this->ClsLastError = "Error al realizar la conexion: " . $ex->getMessage();
            $this->setIsOpen(false);
        }
    }

    public function DbClose() {

        $this->Connect_DB = null;

        return;
    }

    public function DB_Execute($SQL) {

        try {

            $query = $this->Connect_DB->prepare($SQL);
            $query->execute();

            echo $SQL;
            $this->fallo_query = false;
            return;
            
            
        } catch (Exception $ex) {
            $this->setClsLastError($ex);
            $this->setDbLastSQL($SQL);
            $this->fallo_query = true;
            return;
        }
    }

    public function DB_Select($SQL) {

        try {

            $query = $this->Connect_DB->prepare($SQL);

            $query->execute(); //

            $resultado_sentencia = $query->fetch(PDO::FETCH_ASSOC);

           
            $this->fallo_query = false;

            return $resultado_sentencia;
            
        } catch (Exception $ex) {
            $this->setClsLastError($ex);
            $this->setDbLastSQL($SQL);
            $this->fallo_query = true;
            return;
        }
    }
    
    public function DbSelect_tablas($SQL){
       try {
           
            $stmt = $this->Connect_DB->query($SQL);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $this->fallo_query = false;
            
            return $stmt;
           
       } catch (Exception $ex) {
            $this->setClsLastError($ex);
            $this->setDbLastSQL($SQL);
            $this->fallo_query = true;
            return;
        }
        
       
    }
    

}
