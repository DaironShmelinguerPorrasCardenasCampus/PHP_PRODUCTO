<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Proveedor extends Conexion{

    private $id;
    private $nom_prov;
    private $cel_prov;
    private $ciudad_prov;
    
    
    


    public function __construct($id = 0, $nom_prov = "", $cel_prov = "",$ciudad_prov="",$dbCnx = ""){
        $this->id = $id;
        $this->nom_prov = $nom_prov;
        $this->cel_prov = $cel_prov;
        $this->ciudad_prov = $ciudad_prov;
        parent::__construct($dbCnx);  
    }

    public function setProveedorId($id){
        $this->id = $id;
    }
    public function getProveedorId(){
        return $this->id;
    }

    public function setProveedorNombre($nom_prov){
        $this->nom_prov = $nom_prov;
    }
    public function getProveedorNombre(){
        return $this->nom_prov;
    }


    public function setProveedorCel($cel_prov){
        $this-> cel_prov= $cel_prov;
    }
    public function getProveedorCel(){
        return $this->cel_prov;
    }

    public function setProveedorCity($ciudad_prov){
        $this-> ciudad_prov= $ciudad_prov;
    }
    public function getProveedorCity(){
        return $this->ciudad_prov;
    }

  

    public function insertProveedor(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO proveedores(nombre,telefono,ciudad) VALUE (?,?,?)");
            $stm -> execute([$this->nom_prov, $this->cel_prov, $this->ciudad_prov]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function obtenerProveedor(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteProveedor(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM proveedores WHERE proveedor_id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('PROVEEDOR ELIMINADO');document.location='proveedor.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
     
     public function selectOne(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores WHERE proveedor_id = ?");
            $stm-> execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(){
        try {
            $stm = $this -> dbCnx -> prepare("UPDATE proveedores SET nombre= ?,telefono= ?,ciudad = ? WHERE proveedor_id = ?");
            $stm-> execute([$this->nom_prov,$this->cel_prov,$this->ciudad_prov,$this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}




































?>