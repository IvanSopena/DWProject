<?php

/*
 * @author Ivan Sopeña
 * 
 * Esta clase es la que va a contener la 
 * conexion con la base de datos asi como
 * las consultas y demas acciones que se realicen con ella.
 */



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
    public $errors = false;
    public $mAppUserName = "";
    public $mRealUserName = "";
    public $mAppUserId = "";
    public $mAppUserPwd = "";
    public $mAppRol = 0;
    public $primeraConexion = false;

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

    function getMAppUserName() {
        return $this->mAppUserName;
    }

    function getMRealUserName() {
        return $this->mRealUserName;
    }

    function getMAppUserId() {
        return $this->mAppUserId;
    }

    function getMAppUserPwd() {
        return $this->mAppUserPwd;
    }

    function getMAppRol() {
        return $this->mAppRol;
    }

    function setErrors($errors) {
        $this->errors = $errors;
    }

    function getErrors() {
        return $this->errors;
    }

    function setMAppUserName($mAppUserName) {
        $this->mAppUserName = $mAppUserName;
    }

    function setMRealUserName($mRealUserName) {
        $this->mRealUserName = $mRealUserName;
    }

    function setMAppUserId($mAppUserId) {
        $this->mAppUserId = $mAppUserId;
    }

    function setMAppUserPwd($mAppUserPwd) {
        $this->mAppUserPwd = $mAppUserPwd;
    }

    function setMAppRol($mAppRol) {
        $this->mAppRol = $mAppRol;
    }
    
    function getPrimeraConexion() {
        return $this->primeraConexion;
    }

    function setPrimeraConexion($primeraConexion) {
        $this->primeraConexion = $primeraConexion;
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

           
            $DB_pass = $GLOBALS['security']-> decrypt(DB_Password,DB_User);  

            $this->Connect_DB = new PDO('mysql:host=' . DB_Server . '; dbname=' . DB_Schema, DB_User, $DB_pass );

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
    
    public function AppOpen($AppUser, $AppPassword) {
        /**
         * Funcion que se encarga de verificar si el usuario esta dado de alta en la base de datos
         * y si la contraseña que ha introducido es la correcta. 
         */
        $sentencia = "";


        $sentencia = "select  Email,password, CONCAT(Nombre,' ', Apellidos) as Usuario , Id, rol,foto from " . $this->getTableOwner() . ".Users where upper (Email)= '" . strtoupper($AppUser) . "'";



        $result = $this->DB_Select($sentencia);

        if ($this->fallo_query == true) {

            $this->setClsLastError("Fallo al buscar el usuario de la aplicación." . $this->DbLastSQL);
            $this->setErrors(true);
            return;
        } else {


            $this->setMAppUserName($result['Email']);
            $this->setMAppUserPwd($result['password']);
            $this->setMRealUserName($result['Usuario']);
            $this->setMAppUserId($result['Id']);
            $this->setMAppRol($result['rol']);
            
           
              $this->setPrimeraConexion($result['foto']);  
          

            $AppPwd = crypt($AppPassword, strtoupper($AppUser)); //Encriptamos usando el algoritmo BLOWFISH
            
         	
            
            if ($this->getMAppUserPwd() == "") {
                $this->setClsLastError("El usuario introducido no esta dado de alta en el sistema.");
                $this->setErrors(true);
                return;
            }


            if ($this->mAppUserPwd != $AppPwd) {
                $this->setClsLastError("Contraseña del usuario de la aplicación incorrecta.");
                $this->setErrors(true);
                return;
            } else {


                $this->setErrors(false);
                return;
            }
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
