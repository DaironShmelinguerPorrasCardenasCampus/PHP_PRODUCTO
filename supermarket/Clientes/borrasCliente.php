<?php


require_once("configCliente.php");
$record = new Cliente();

if (isset($_GET['cliente_id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
            $record-> setClienteId($_GET['cliente_id']);
            $record-> deleteCliente();
            echo "<script>alert('CATEGORIA BORRADA DE LA BASE DE DATOS');document.location='cliente.php'</script>";
    }
}





?>