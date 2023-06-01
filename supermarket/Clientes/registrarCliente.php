<?php

if(isset($_POST['guardarCliente'])){
 require_once("configCliente.php");    

 $config = new Cliente();
 $config-> setClienteCelular($_POST['celular']);
 $config-> setClienteCompa($_POST['compañia']);
 $config-> insertCliente();
 echo "<script> alert('CATEGORIA INSERTADA CORRECTAMENTE');document.location='cliente.php'</script>";

}









?>