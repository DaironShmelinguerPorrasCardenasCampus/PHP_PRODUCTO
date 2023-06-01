<?php
require_once("configProveedor.php");
$record = new Proveedor();

if (isset($_GET['proveedor_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setProveedorId($_GET['proveedor_id']);
            $record-> deleteProveedor();
            echo "<script>alert('PROVEEDOR BORRADO DE LA BASE DE DATOS');document.location='proveedor.php'</script>";
    }
}





?>