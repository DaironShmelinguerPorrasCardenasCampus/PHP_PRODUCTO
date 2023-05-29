<?php

if(isset($_POST['guardarCategoria'])){
 require_once("configCategory.php");    

 $config = new Category();
 $config-> setNombre($_POST['nombre']);
 $config-> setDescripcion($_POST['descripcion']);
 $config-> setImagen($_POST['imagen']);
 $config-> insertCategory();
 echo "<script> alert('CATEGORIA INSERTADA CORRECTAMENTE');document.location='categoria.php'</script>";

}









?>