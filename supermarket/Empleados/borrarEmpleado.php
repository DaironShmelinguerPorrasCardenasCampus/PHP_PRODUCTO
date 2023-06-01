<?php
require_once("configEmpleado.php");
$record = new Empleado();

if (isset($_GET['empleado_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setEmpleadoId($_GET['empleado_id']);
            $record-> deleteEmpleado();
            echo "<script>alert('CATEGORIA BORRADA DE LA BASE DE DATOS');document.location='empleado.php'</script>";
    }
}





?>