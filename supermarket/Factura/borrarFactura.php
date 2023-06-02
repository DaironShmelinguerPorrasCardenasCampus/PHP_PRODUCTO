<?php
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);

require_once("configFactura.php");
$record = new Factura();

if (isset($_GET['factura_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setFacturaId($_GET['factura_id']);
            $record-> deleteFactura();
            echo "<script>alert('FACTURA BORRADA DE LA BASE DE DATOS');document.location='factura.php'</script>";
    }
}





?>