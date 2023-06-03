<?php
  ini_set("display_errors" , 1);
  ini_set("display_starup_errors" , 1);
  
  error_reporting(E_ALL);  

if(isset($_POST['guardarFacturaDetalle'])){
 require_once("configFacDetalle.php");    

 $config = new Detalle();
 $config-> setFacturaId($_POST['factura']);
 $config-> setProductoId($_POST['producto']);
 

 $config-> insertFacturaDetalle();

 echo "<script> alert('FACTURA INSERTADA CORRECTAMENTE');document.location ='facturaDetalle.php'</script>";

}









?>