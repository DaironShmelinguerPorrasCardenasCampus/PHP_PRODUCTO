<?php
require_once("../config/db.php");
require_once("../config/conexion.php");
require_once("LoginUser.php");

class RegistrarUser extends Conexion{

    private $id;
    private $idRol;
    private $email;
    private $username;
    private $password;

    public function __construct($id = 0 , $idRol= "", $email = "", $username = "",$password = "", $dbCnx = "")
    {
        $this->id = $id ;
        $this->idRol = $idRol;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this-> id;
    }

    public function setIdRol($idRol){
        $this->idRol = $idRol;
    }
    public function getIdRol(){
        return $this-> idRol;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this-> email;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this-> username;
    }

    
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this-> password;
    }
        //MÉTODO PARA VALIDAR USUARIOS REPETIDOS
    public function checkUser($email){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM user WHERE email = '$email'");
            $stm -> execute();
            if($stm->fetchColumn()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function InsertData(){
    try {
        $stm = $this-> dbCnx -> prepare("INSERT INTO user (idRol, email, username, password) values (?,?,?,?)");
        $stm -> execute([$this->idRol,$this->email,$this->username, md5($this->password)]);

        $login = new LOginUser();
        $login -> setEmail($_POST['email']);
        $login -> setPassword($_POST['password']);

        $success = $login -> login();
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


public function MostrarRol(){

   
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM rol");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }



}




}










?>