<?php

ini_set("display_errors" , 1);
ini_set("display_starup_errors" , 1);

error_reporting(E_ALL);     

if(isset($_POST['registrarse'])){

    require_once("RegistroUser.php");
    $registrar = new RegistrarUser();

    $registrar->setIdRol($_POST['rol']);
    $registrar->setEmail($_POST['email']);
    $registrar->setUsername($_POST['username']);
    $registrar->setPassword($_POST['password']);



    if($registrar->checkUser($_POST['email'])){
        echo "<script> alert('EL USUARIO YA EXISTE EN LA BASE DE DATOS');document.location = 'loginRegister.php'</script>";
    }else{
        $registrar->InsertData();
        echo "<script> alert('USUARIO REGISTRADO EXITOSAMENTE');document.location = '../Home/home.php'</script>";
    }
}







?>