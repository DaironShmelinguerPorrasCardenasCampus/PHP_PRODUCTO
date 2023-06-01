<?php
   ini_set("display_errors" , 1);
   ini_set("display_starup_errors" , 1);
   
   error_reporting(E_ALL); 
  
if(isset($_POST['guardarProveedor'])){
 require_once("configProveedor.php");    

 $config = new Proveedor();
 $config-> setProveedorNombre($_POST['nombre']);
 $config-> setProveedorCel($_POST['celular']);
 $config-> setProveedorCity($_POST['ciudad']);
 $config-> insertProveedor();
 echo "<script> alert('EMPLEADO INSERTADO CORRECTAMENTE');document.location ='proveedor.php'</script>";

}









?>