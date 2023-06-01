<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Cliente extends Conexion{

    private $id;
    private $cliente_celular;
    private $cliente_compa;
    
    


    public function __construct($id = 0, $cliente_celular = "", $cliente_compa = "",$dbCnx = ""){
        $this->id = $id;
        $this->cliente_celular = $cliente_celular;
        $this->cliente_compa = $cliente_compa;
        parent::__construct($dbCnx);  
    }

    public function setClienteId($id){
        $this->id = $id;
    }
    public function getClienteId(){
        return $this->id;
    }

    public function setClienteCelular($cliente_celular){
        $this->cliente_celular = $cliente_celular;
    }
    public function getClienteCelular(){
        return $this->cliente_celular;
    }


    public function setClienteCompa($cliente_compa){
        $this-> cliente_compa= $cliente_compa;
    }
    public function getClienteCompa(){
        return $this->cliente_compa;
    }


    public function insertCliente(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO clientes(cliente_celular,cliente_compa) VALUE (?,?)");
            $stm -> execute([$this->cliente_celular, $this->cliente_compa]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function obtenerCliente(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteCliente(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM clientes WHERE cliente_id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('CLIENTE ELIMINADO');document.location='cliente.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
     
     public function selectOne(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes WHERE cliente_id = ?");
            $stm-> execute([$this->id]);
            return $stm-> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(){
        try {
            $stm = $this -> dbCnx -> prepare("UPDATE clientes SET cliente_celular = ? , cliente_compa = ?  WHERE cliente_id = ?");
            $stm-> execute([$this->cliente_celular,$this->cliente_compa,$this->cliente_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}




































?>