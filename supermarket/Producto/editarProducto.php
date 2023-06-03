<?php
 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);

   require_once("configProducto.php");
   $data = new Producto();
   

   require_once("../categorias/configCategory.php");
   require_once("../Proveedores/configProveedor.php");

    $dataCategory = new Category();
    $allCategory = $dataCategory -> obtenerCategory();

    $dataProveedor = new Proveedor();
    $allProveedor= $dataProveedor -> obtenerProveedor();
   

    $id = $_GET['producto_id']; 
    $data-> setProductoId($id);

    $record = $data->selectOne();
  

    $val = $record[0]; 
    

    if(isset($_POST['editar'])){


        $data-> setCategoriaId($_POST['categoria']);
        $data-> setProductoPrecio($_POST['precio']);
        $data-> setProductoStock($_POST['stock']);
        $data-> setProductoUnidad($_POST['pedido']);
        $data-> setProveedorId($_POST['proveedor']);
        $data-> setProductoNombre($_POST['nombre']);
        $data-> setProDescontinuado($_POST['descontinuado']);
        $data-> update();
        echo "<script> alert ('DATOS ACTUALIZADOS EXITOSAMENTE');document.location='producto.php'</script>";
    }   
    
?>
<!DOCTYPE html>
<html>
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Producto</title>
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
          <h3 style="margin-bottom: 2rem;">Productos</h3>
          <img src="../css/factura.png" alt="categorias" class="imagenPerfil">
        
        </div>
        <div class="menus">
          
          <a href="../home/home.php" style="display: flex;gap:2px;">
              <i class="bi bi-house-door"> </i>
              <h3 style="margin: 0px;">Home</h3>
            </a>
            <a href="../categorias/categoria.php" style="display: flex;gap:1px;">
              <i class="bi bi-people"></i>
              <h3 style="margin: 0px;font-weight: 800;">Categorías</h3>
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
          <h2 class="m-2">MODIFICAR PRODUCTO</h2>
        <div class="menuTabla contenedor2">
        
        <form class="col d-flex flex-wrap" action="" method="post">
              <div class="mb-1 col-12">
                <label for="categoria" class="form-label">CATEGORIA</label>

                <select class="form-control" name="categoria" id="categoria" required value="<?php echo $val['nombre_categoria'];?>">
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
                  value ="<?php echo $val['precio_unitario'];?>" 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="stock" class="form-label">STOCK</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                  value ="<?php echo $val['stock'];?>" 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="pedido" class="form-label">UNIDADES PEDIDAS</label>
                <input 
                  type="number"
                  id="pedido"
                  name="pedido"
                  class="form-control" 
                  value ="<?php echo $val['unidades_pedidas'];?>" 
                />
              </div>
             

              <div class="mb-1 col-12">
                <label for="proveedor" class="form-label">PROVEEDOR</label>
                <select class="form-control" name="proveedor" id="proveedor" required value="<?php echo $val['nombre_proveedor'];?>">
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
                  value ="<?php echo $val['nombre_producto'];?>" 
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="descontinuado" class="form-label">DESCONTINUADO</label>
                <select class="form-control" name="descontinuado" id="descontinuado" required  value ="<?php echo $val['descontinuado'];?>">
                <option value="select">Seleccione si está descontinuado</option>
                <option name="descontinuado" value="Si">SI</option>
                <option name="descontinuado" value="No">NO</option>
                  
                </select>
              </div>


              <div class=" col-12 m-2">
                  <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                </div>
                </form>

          <div id="charts1" class="charts"> </div>
        </div>
      </div>


      </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>




  </body>

</html>