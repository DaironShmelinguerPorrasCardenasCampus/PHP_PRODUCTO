<?php
  

if(isset($_POST['guardarFactura'])){
 require_once("configFactura.php");    

 $config = new Factura();
 $config-> setEmpleadoId($_POST['empleado']);
 $config-> setClienteId($_POST['cliente']);
 $config-> setFacturaFecha($_POST['fecha']);
 $config-> insertFactura();

 echo "<script> alert('EMPLEADO INSERTADO CORRECTAMENTE');document.location ='factura.php'</script>";

}









?>