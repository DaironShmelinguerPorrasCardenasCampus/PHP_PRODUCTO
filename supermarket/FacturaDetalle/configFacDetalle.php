<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Detalle extends Conexion{
    private $fac_id_detalle;
    private $facturaId;
    private $productoId;
    private $cantidad;
    private $precio_venta;
    
 
    public function __construct($fac_id_detalle= 0 ,$facturaId = "", $productoId = "", $cantidad= "",$precio_venta="",$dbCnx = ""){
        $this->fac_id_detalle = $fac_id_detalle;
        $this->facturaId = $facturaId;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
        $this->precio_venta = $precio_venta;
        parent::__construct($dbCnx);  
    }

    public function setFacturaIdDetalle($fac_id_detalle){
        $this->fac_id_detalle = $fac_id_detalle;
    }
    public function getFacturaIdDetalle(){
        return $this->fac_id_detalle;
    }

    public function setFacturaId($facturaId){
        $this->facturaId = $facturaId;
    }
    public function getFacturaId(){
        return $this->facturaId;
    }

    public function setProductoId($productoId){
        $this->productoId = $productoId;
    }
    public function getProductoId(){
        return $this->productoId;
    }


    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    public function getCantidad(){
        return $this->cantidad;
    }

    public function setPrecio($precio_venta){
        $this-> precio_venta= $precio_venta;
    }
    public function getPrecio(){
        return $this->precio_venta;
    }




    public function insertFacturaDetalle(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO facturadetalle(factura_id,producto_id,cantidad,precio_venta) VALUE (?,?,?,?)");
            $stm -> execute([$this->facturaId, $this->productoId, $this->cantidad, $this->precio_venta]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

            
    public function obtenerFacturaDetalleInner(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT facturadetalle.fac_detalle_id, facturas.factura_id,productos.nombre_producto AS producto,productos.unidades_pedidas,facturadetalle.precio_venta * productos.precio_unitario AS precio_venta FROM facturadetalle INNER JOIN facturas ON facturadetalle.factura_id = facturas.factura_id INNER JOIN productos ON facturadetalle.producto_id = productos.producto_id ; ");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

            }

    public function deleteFacturaDetalle(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM facturadetalle WHERE fac_detalle_id = ?");
                $stm -> execute([$this->fac_id_detalle]);
                return $stm -> fetchAll();
                echo "<script>alert('DETALLE DE FACTURA ELIMINADA');document.location='facturaDetalle.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
     
   
}




































?>