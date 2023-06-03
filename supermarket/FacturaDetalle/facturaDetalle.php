<?php
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);
require_once("configFacDetalle.php");
require_once("../Producto/configProducto.php");
require_once("../Factura/configFactura.php");

$dataFacturaD = new Detalle();
$allFacturaD = $dataFacturaD -> obtenerFacturaDetalleInner();

$dataProducto = new Producto();
$allProducto = $dataProducto -> obtenerProductoInner();

$dataFactura = new Factura();
$allFactura = $dataFactura -> obtenerFacturaInner();
   


?>





<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facturas</title>
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
        <a href="/Home/home.php" style="display: flex;gap:2px;">
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
          <a href="../Producto/producto.php" style="display: flex;gap:1px;">
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
        <h2>FACTURAS</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarDetalle"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">ID DETALLE</th>
              <th scope="col">FACTURA ID</th>
              <th scope="col">PRODUCTO</th>
              <th scope="col">CANTIDAD</th>
              <th scope="col">PRECIO VENTA</th>
              <th scope="col">ELIMINAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php 
            foreach($allFacturaD as $factura){
            ?>
            
            <tr>
              <td><?=$factura['fac_detalle_id'];?></td>
              <td><?=$factura['factura_id'];?></td>
              <td><?=$factura['producto'];?></td>
              <td><?=$factura['unidades_pedidas'];?></td>
              <td><?=$factura['precio_venta'];?></td>
              <td><a class="btn btn-danger" href="borrasDetalle.php?fac_detalle_id=<?=$factura['fac_detalle_id']?>&&req=delete">Borrar</a></td>
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
    <div class="modal fade" id="registrarDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Factura Detalle</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">

            <form class="col d-flex flex-wrap" action="registrarDetalle.php" method="post">
              <div class="mb-1 col-12">
                <label for="factura" class="form-label">FACTURA ID</label>

                <select class="form-control" name="factura" id="factura" required>
                <option value="select">Seleccione el id de la factura</option>
                  <?php
                  foreach($allFactura as $factura){
                  ?>

                  <option name="factura" value="<?=$factura['factura_id'];?>"><?=$factura['factura_id']?></option>

                  <?php
                  }
                  ?>
                </select>
                
              </div>

              <div class="mb-1 col-12">
                <label for="producto" class="form-label">PRODUCTO</label>
                <select class="form-control" name="producto" id="producto" required>
                <option value="select">Seleccione el producto</option>
                  <?php
                  foreach($allProducto as $producto){
                  ?>

                  <option name="producto" value="<?=$producto['producto_id'];?>"><?=$producto['nombre_producto']?></option>

                  <?php
                  }
                  ?>
                </select>
              </div>


              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardarFacturaDetalle"/>
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