<?php

require_once("../config/db.php");
require_once("../config/conexion.php");

class Producto extends Conexion{

    private $id;
    private $categoriaId;
    private $precio;
    private $stock;
    private $Unidad_pedida;
    private $proveedorId;
    private $nombre;
    private $descontinuado;
    
    


    public function __construct($id = 0, $categoriaId = "", $precio= "",$stock="",$Unidad_pedida="",$proveedorId="",$nombre="",$descontinuado="",$dbCnx = ""){
        $this->id = $id;
        $this->categoriaId = $categoriaId;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->Unidad_pedida = $Unidad_pedida;
        $this->proveedorId = $proveedorId;
        $this->nombre = $nombre;
        $this->descontinuado = $descontinuado;
        parent::__construct($dbCnx);  
    }

    public function setProductoId($id){
        $this->id = $id;
    }
    public function getProductoId(){
        return $this->id;
    }

    public function setCategoriaId($categoriaId){
        $this->categoriaId = $categoriaId;
    }
    public function getCategoriaId(){
        return $this->categoriaId;
    }


    public function setProductoPrecio($precio){
        $this-> precio= $precio;
    }
    public function getProductoPrecio(){
        return $this->precio;
    }

    public function setProductoStock($stock){
        $this-> stock= $stock;
    }
    public function getProductoStock(){
        return $this->stock;
    }

    public function setProductoUnidad($Unidad_pedida){
        $this-> Unidad_pedida= $Unidad_pedida;
    }
    public function getProductoUnidad(){
        return $this->Unidad_pedida;
    }

    public function setProveedorId($proveedorId){
        $this-> proveedorId= $proveedorId;
    }
    public function getProveedorId(){
        return $this->proveedorId;
    }

    public function setProductoNombre($nombre){
        $this-> nombre= $nombre;
    }
    public function getsetProductoNombre(){
        return $this->nombre;
    }

    public function setProDescontinuado($descontinuado){
        $this-> descontinuado= $descontinuado;
    }
    public function getProDescontinuado(){
        return $this->descontinuado;
    }





    public function insertProducto(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO productos(pro_categoria_id,precio_unitario,stock,unidades_pedidas,pro_proveedor_id,nombre_producto,descontinuado) VALUE (?,?,?,?,?,?,?)");
            $stm -> execute([$this->categoriaId, $this->precio, $this->stock, $this->Unidad_pedida, $this->proveedorId, $this->nombre, $this->descontinuado]);
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    public function obtenerProductoInner(){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT productos.producto_id, categorias.nombre AS nombre_categoria, productos.precio_unitario, productos.stock, productos.unidades_pedidas, proveedores.nombre AS nombre_proveedor, productos.nombre_producto, productos.descontinuado, productos.stock - productos.unidades_pedidas AS stock_disponible  FROM productos INNER JOIN categorias ON productos.pro_categoria_id = categorias.categoria_id INNER JOIN proveedores ON productos.pro_proveedor_id = proveedores.proveedor_id;");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }

    }

            

    public function deleteProducto(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM productos WHERE producto_id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('PRODUCTO ELIMINADO');document.location='producto.php'</script>";
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