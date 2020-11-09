<?php

/**
 * En esta clase vamos a tratar de contener las tareas que trabajan con la base de datos.
 * Esta clase hereda de Db_CLASS ya que es donde emos realizado la conexion con la base de datos.
 *
 * @author Ivan Sopeña
 */
require "Server/app/Db_CLASS.php";

class DB_Task extends Db_CLASS {

    //Definimos las variables que va a necesitar la clase.

    public $error_login = "";
    public $errors = false;
    public $mAppUserName = "";
    public $mRealUserName = "";
    public $mAppUserId = "";
    public $mAppUserPwd = "";
    public $mAppRol = 0;
    public $primeraConexion = false;
    public $mi_resultado = "";
    public $count;

   /*  public function DB_Task() {
        parent::__construct();
    } */
    public function __construct(){			
        parent::__construct();
    }

//Creamos los getters y seters de las variables

    function getError_login() {
        return $this->error_login;
    }
    
    function getCount() {
        return $this->count;
    }

    function setCount($count) {
        $this->count = $count;
    }

        
    function getErrors() {
        return $this->errors;
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

    function setError_login($error_login) {
        $this->error_login = $error_login;
    }

    function setErrors($errors) {
        $this->errors = $errors;
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
    
    function getMi_resultado() {
        return $this->mi_resultado;
    }

    function setMi_resultado($mi_resultado) {
        $this->mi_resultado = $mi_resultado;
    }

    
    
    //Codificamos los atributos de la clase

    public function AppOpen($AppUser, $AppPassword) {
        /**
         * Funcion que se encarga de verificar si el usuario esta dado de alta en la base de datos
         * y si la contraseña que ha introducido es la correcta. 
         */
        $sentencia = "";


        $sentencia = "select  Email,password, CONCAT(Nombre,' ', Apellidos) as Usuario , Id, rol,primer_acceso from " . $this->getTableOwner() . ".accesosapp where upper (Email)= '" . strtoupper($AppUser) . "'";



        $result = $this->DB_Select($sentencia);

        if ($this->fallo_query == true) {

            $this->setError_login("Fallo al buscar el usuario de la aplicación." . $this->DbLastSQL);
            $this->setErrors(true);
            return;
        } else {


            $this->setMAppUserName($result['Email']);
            $this->setMAppUserPwd($result['password']);
            $this->setMRealUserName($result['Usuario']);
            $this->setMAppUserId($result['Id']);
            $this->setMAppRol($result['rol']);
            
            if($result['primer_acceso']=='0'){
              $this->setPrimeraConexion(true);  
            }
            else{
                $this->setPrimeraConexion(false);
            }

            $AppPwd = crypt($AppPassword, strtoupper($AppUser)); //Encriptamos usando el algoritmo BLOWFISH
            
         	
            
            if ($this->getMAppUserPwd() == "") {
                $this->setError_login("El usuario introducido no esta dado de alta en el sistema.");
                $this->setErrors(true);
                return;
            }


            if ($this->mAppUserPwd != $AppPwd) {
                $this->setError_login("Contraseña del usuario de la aplicación incorrecta.");
                $this->setErrors(true);
                return;
            } else {


                $this->setErrors(false);
                return;
            }
        }
    }

     public function OpenSession($user) {
        /**
         * Funcion que si la sesion esta abierta (session_start()) nos indica si existe el usuario,
         * si existe devuleve false (porque no hay errores) y continuamos con la carga de la pagina correspondiente.
         */
       /* $sentencia = "";
        $sentencia =  "select AppName, Pass, CONCAT(Nombre,' ', Apellidos) as Usuario , App_Id, rol,primer_acceso from " . $this->getTableOwner() . ".accesosapp where upper (AppName)= '" . strtoupper($AppUser) . "'";

        $result = $this->DB_Select($sentencia);

        if ($this->fallo_query == true) {

            $this->setErrors(true);
            return;
        } else {


          $this->setMAppUserName($result['AppName']);
            $this->setMAppUserPwd($result['Pass']);
            $this->setMRealUserName($result['Usuario']);
            $this->setMAppUserId($result['App_Id']);
            $this->setMAppRol($result['rol']);
            

            $this->setErrors(false);
            return;
        }*/
    } 

    public function EmailExists($email) {
        /**
         * Funcion que si el email de verificacion existe nos devolvera true para poder seguir con el proceso de 
         * recuperacion de la contraseña del usuario.
         */
        $sentencia = "";
        $sentencia = "select IFNULL(AppName,'') as name,IFNULL(App_Id,'') as id,count(email) as Confirmacion from " . $this->getTableOwner() . ".accesosapp where email= '" . $email . "'";

        

        $result = $this->DB_Select($sentencia);

        if ($this->fallo_query == true) {

            $this->setErrors(true);
           
            return false;
            
        } else {
            
            if ($result['Confirmacion'] === "1") {
                
                $this->setMAppUserId($result['id']);
                $this->setMAppUserName($result['name']);
               
                
                return true;
                 
                
            } else {
                
                return false;
                
            }
            
           
            $this->setErrors(false);
        }
    }
    
    
    public function mis_acometidas() {
        try{
            
            $this->count =0;
            $sql="";
            $sql = "Select Acometida,Direccion,Lectura_2016,Lectura_2017,Observaciones from " . $this->getTableOwner() . ".consumos_v where Id_vecino = '" . $_COOKIE["Id"] . "'";
            
            $mi_result="";
            
            $result = $this->DbSelect_tablas($sql);
            
             if ($this->fallo_query == true) {

                     $this->setErrors(true);
           
                     return;
            
            } else {
                
                 while ($row = $result->fetch()) {
                        $mi_result = $mi_result . "<tr>
                                <td>" . htmlspecialchars($row["Acometida"]) . "</td>
                                <td>" . htmlspecialchars($row["Direccion"]) . "</td>
                                <td>" . htmlspecialchars($row["Lectura_2016"]) . "</td>
                                <td>" . htmlspecialchars($row["Lectura_2017"]) . "</td>
                                <td>" . htmlspecialchars($row["Observaciones"]) . "</td>
                        </tr>";
                        
                        $this->count =  $this->count + 1;
                }
                
                $this->setMi_resultado($mi_result);
                $this->setErrors(false);
                return; 
                
            }
            
           
            
            
        }catch (Exception $ex) {
            $this->setErrors(true);
            $this->setClsLastError($ex);
            $this->setDbLastSQL($sql);
            return;
        }
        
    }
    
    public function mis_datos(){
        $sql="";
        $sql = "select AppName, Pass, Nombre, Apellidos, email from " . $this->getTableOwner() . ".accesosapp where App_Id = '" . $_COOKIE["Id"] . "'";
        
        $result = $this->DB_Select($sql);
        
         if ($this->fallo_query == true) {

            $this->setErrors(true);
            
            return;
        } else {
            return $result;
        }
    }

}
