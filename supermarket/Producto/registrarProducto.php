<?php
  ini_set("display_errors" , 1);
  ini_set("display_starup_errors" , 1);
  
  error_reporting(E_ALL);  

if(isset($_POST['guardarFactura'])){
 require_once("configProducto.php");    

 $config = new Producto();
 $config-> setEmpleadoId($_POST['empleado']);
 $config-> setClienteId($_POST['cliente']);
 $config-> setFacturaFecha($_POST['fecha']);
 $config-> insertFactura();

 echo "<script> alert('EMPLEADO INSERTADO CORRECTAMENTE');document.location ='factura.php'</script>";

}









?>