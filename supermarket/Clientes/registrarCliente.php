<?php

ini_set("display_errors" , 1);
ini_set("display_starup_errors" , 1);

error_reporting(E_ALL);     

if(isset($_POST['guardarCliente'])){
 require_once("configCliente.php");    

 $config = new Cliente();
 $config-> setClienteCelular($_POST['celular']);
 $config-> setClienteCompa($_POST['compañia']);
 $config-> insertCliente();

 echo "<script> alert('CLIENTE INSERTADO CORRECTAMENTE');document.location ='cliente.php'</script>";

}









?>