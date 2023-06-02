<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Factura extends Conexion{

    private $id;
    private $id_emple;
    private $id_cliente;
    private $fecha;
    
 
    public function __construct($id = 0, $id_emple = "", $id_cliente= "",$fecha="",$dbCnx = ""){
        $this->id = $id;
        $this->id_emple = $id_emple;
        $this->id_cliente = $id_cliente;
        $this->fecha = $fecha;
        parent::__construct($dbCnx);  
    }

    public function setFacturaId($id){
        $this->id = $id;
    }
    public function getFacturaId(){
        return $this->id;
    }

    public function setEmpleadoId($id_emple){
        $this->id_emple = $id_emple;
    }
    public function getEmpleadoId(){
        return $this->id_emple;
    }


    public function setClienteId($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    public function getClienteId(){
        return $this->id_cliente;
    }

    public function setFacturaFecha($fecha){
        $this-> fecha= $fecha;
    }
    public function getFacturaFecha(){
        return $this->fecha;
    }




    public function insertFactura(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO facturas(fac_empleado_id,fac_cliente_id,fecha) VALUE (?,?,?)");
            $stm -> execute([$this->id_emple, $this->id_cliente, $this->fecha]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

            
    public function obtenerFacturaInner(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT facturas.factura_id, empleados.nombre_empleado, clientes.cliente_compa, facturas.fecha FROM facturas INNER JOIN empleados ON facturas.fac_empleado_id = empleados.empleado_id INNER JOIN clientes ON facturas.fac_cliente_id = clientes.cliente_id; ");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteFactura(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM facturas WHERE factura_id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('FACTURA ELIMINADA');document.location='factura.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
     
   
}




































?>