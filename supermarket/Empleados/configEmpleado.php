<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Empleado extends Conexion{

    private $id;
    private $nom_emple;
    private $cel_emple;
    private $dir_emple;
    private $img_emple;
    
    


    public function __construct($id = 0, $nom_emple = "", $cel_emple= "",$dir_emple="",$img_emple="",$dbCnx = ""){
        $this->id = $id;
        $this->nom_emple = $nom_emple;
        $this->cel_emple = $cel_emple;
        $this->dir_emple = $dir_emple;
        $this->img_emple = $img_emple;
        parent::__construct($dbCnx);  
    }

    public function setEmpleadoId($id){
        $this->id = $id;
    }
    public function getEmpleadoId(){
        return $this->id;
    }

    public function setEmpleadoNombre($nom_emple){
        $this->nom_emple = $nom_emple;
    }
    public function getEmpleadoNombre(){
        return $this->nom_emple;
    }


    public function setEmpleadoCel($cel_emple){
        $this-> cel_emple= $cel_emple;
    }
    public function getEmpleadoCel(){
        return $this->cel_emple;
    }

    public function setEmpleadoDir($dir_emple){
        $this-> dir_emple= $dir_emple;
    }
    public function getEmpleadoDir(){
        return $this->dir_emple;
    }

    public function setEmpleadoImg($img_emple){
        $this-> img_emple= $img_emple;
    }
    public function getEmpleadoImng(){
        return $this->img_emple;
    }


    public function insertEmpleado(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO empleados(nombre_empleado,celular_empleado,direccion_empleado,imagen_empleado) VALUE (?,?,?,?)");
            $stm -> execute([$this->nom_emple, $this->cel_emple, $this->dir_emple, $this->img_emple]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function obtenerEmpleado(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteEmpleado(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM empleados WHERE empleado_id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('CLIENTE ELIMINADO');document.location='empleado.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
     
     public function selectOne(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados WHERE empleado_id = ?");
            $stm-> execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(){
        try {
            $stm = $this -> dbCnx -> prepare("UPDATE empleados SET nombre_empleado= ?,celular_empleado= ?,direccion_empleado = ?,imagen_empleado = ? WHERE empleado_id = ?");
            $stm-> execute([$this->nom_emple,$this->cel_emple,$this->dir_emple,$this->img_emple,$this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}




































?>