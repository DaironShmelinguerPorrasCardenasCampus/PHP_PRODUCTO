<?php
   

if(isset($_POST['guardarEmpleado'])){
 require_once("configEmpleado.php");    

 $config = new Empleado();
 $config-> setEmpleadoNombre($_POST['nombre']);
 $config-> setEmpleadoCel($_POST['celular']);
 $config-> setEmpleadoDir($_POST['direccion']);
 $config-> setEmpleadoImg($_POST['fotografia']);
 $config-> insertEmpleado();

 echo "<script> alert('EMPLEADO INSERTADO CORRECTAMENTE');document.location ='empleado.php'</script>";

}









?>