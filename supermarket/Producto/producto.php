<?php
session_start();
if(empty($_SESSION) || !$_SESSION['username']){
    echo "<script> alert('SU SESION HA FINALIZADO.');document.location = '../login/loginRegister.php'</script>";
} 

 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);
require_once("configProducto.php");
require_once("../categorias/configCategory.php");
require_once("../Proveedores/configProveedor.php");

$dataProducto = new Producto();
$allProducto = $dataProducto -> obtenerProductoInner();

$dataCategory = new Category();
$allCategory = $dataCategory -> obtenerCategory();

$dataProveedor = new Proveedor();
$allProveedor= $dataProveedor -> obtenerProveedor();
   


?>





<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/supermarket.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Laika</h3>
        <img src="../css/perro-globo.png" alt="" class="imagenPerfil">
        
      </div>
      <div class="menus">
        <a href="../Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../categorias/categoria.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorias</h3>
        </a>
        <a href="../Clientes/cliente.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
          </a>
          <a href="../Empleados/empleado.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
          </a>
          <a href="../Proveedores/proveedor.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
          </a>
          <a href="../Productos/producto.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
          </a>
          <a href="../Factura/factura.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
          </a>
          <a href="../FacturaDetalle/facturaDetalle.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Factura Detalle</h3>
          </a>


      </div>
</div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>PRODUCTOS</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarProducto"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">ID </th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">PRECIO </th>
              <th scope="col">STOCK</th>
              <th scope="col">PEDIDO</th>
              <th scope="col">PROVEEDOR</th>
              <th scope="col">PRODUCTO</th>
              <th scope="col">DESCONTINUADO</th>
              <th scope="col">DISP</th>
              <th scope="col">BORRAS</th>
              <th scope="col">MODIFICAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php 
            foreach($allProducto as $producto){
            ?>
            
            <tr>
              <td><?=$producto['producto_id'];?></td>
              <td><?=$producto['nombre_categoria'];?></td>
              <td><?=$producto['precio_unitario'];?></td>
              <td><?=$producto['stock'];?></td>
              <td><?=$producto['unidades_pedidas'];?></td>
              <td><?=$producto['nombre_proveedor'];?></td>
              <td><?=$producto['nombre_producto'];?></td>
              <td><?=$producto['descontinuado'];?></td>
              <td><?=$producto['stock_disponible'];?></td>
              <td><a class="btn btn-danger" href="borrarProducto.php?producto_id=<?=$producto['producto_id']?>&&req=delete">Borrar</a></td>
              <td> <a  class="btn btn-primary" href="editarProducto.php?producto_id=<?=$producto['producto_id']?>">MODIFICAR </a></td>
            </tr>

            <?php
            }
            ?>
       

          </tbody>
        
        </table>

      </div>


    </div>

  
    <div class="parte-derecho " id="detalles">
      <h3>Detalle</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>


    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">

            <form class="col d-flex flex-wrap" action="registrarProducto.php" method="post">
              <div class="mb-1 col-12">
                <label for="categoria" class="form-label">CATEGORIA</label>

                <select class="form-control" name="categoria" id="categoria" required>
                <option value="select">Seleccione la categoria</option>
                  <?php
                  foreach($allCategory as $categoria){
                  ?>

                  <option name="categoria" value="<?=$categoria['categoria_id'];?>"><?=$categoria['nombre']?></option>

                  <?php
                  }
                  ?>
                </select>
                
              </div>

              <div class="mb-1 col-12">
                <label for="precio" class="form-label">PRECIO UNITARIO</label>
                <input 
                  type="text"
                  id="precio"
                  name="precio"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="stock" class="form-label">STOCK</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="pedido" class="form-label">UNIDADES PEDIDAS</label>
                <input 
                  type="number"
                  id="pedido"
                  name="pedido"
                  class="form-control"  
                />
              </div>
             

              <div class="mb-1 col-12">
                <label for="proveedor" class="form-label">PROVEEDOR</label>
                <select class="form-control" name="proveedor" id="proveedor" required>
                <option value="select">Seleccione el proveedor</option>
                  <?php
                  foreach($allProveedor as $proveedor){
                  ?>

                  <option name="proveedor" value="<?=$proveedor['proveedor_id'];?>"><?=$proveedor['nombre']?></option>

                  <?php
                  }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">NOMBRE PRODUCTO</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"
                  required  
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="descontinuado" class="form-label">DESCONTINUADO</label>
                <select class="form-control" name="descontinuado" id="descontinuado" required>
                <option value="select">Seleccione si está descontinuado</option>
                <option name="descontinuado" value="Si">SI</option>
                <option name="descontinuado" value="No">NO</option>
                  
                </select>
              </div>


              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardarProducto"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>