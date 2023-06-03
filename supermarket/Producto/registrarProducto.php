<?php
  ini_set("display_errors" , 1);
  ini_set("display_starup_errors" , 1);
  
  error_reporting(E_ALL);  

if(isset($_POST['guardarProducto'])){
 require_once("configProducto.php");    

 $config = new Producto();
 $config-> setCategoriaId($_POST['categoria']);
 $config-> setProductoPrecio($_POST['precio']);
 $config-> setProductoStock($_POST['stock']);
 $config-> setProductoUnidad($_POST['pedido']);
 $config-> setProveedorId($_POST['proveedor']);
 $config-> setProductoNombre($_POST['nombre']);
 $config-> setProDescontinuado($_POST['descontinuado']);
 $config-> insertProducto();

 echo "<script> alert('PRODUCTO INSERTADO CORRECTAMENTE');document.location ='producto.php'</script>";

}









?>