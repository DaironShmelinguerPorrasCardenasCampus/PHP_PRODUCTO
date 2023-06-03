<?php
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);

require_once("configProducto.php");
$record = new Producto();

if (isset($_GET['producto_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setProductoId($_GET['producto_id']);
            $record-> deleteProducto();
            echo "<script>alert('PRODUCTO BORRADO DE LA BASE DE DATOS');document.location='producto.php'</script>";
    }
}





?>