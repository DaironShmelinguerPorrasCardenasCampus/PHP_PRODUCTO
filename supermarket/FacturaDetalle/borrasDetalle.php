<?php
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);

require_once("configFacDetalle.php");
$record = new Detalle();

if (isset($_GET['fac_detalle_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setFacturaIdDetalle($_GET['fac_detalle_id']);
            $record-> deleteFacturaDetalle();
            echo "<script>alert('PRODUCTO BORRADO DE LA BASE DE DATOS');document.location='facturaDetalle.php'</script>";
    }
}





?>