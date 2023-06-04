<?php

   require_once("configCliente.php");
   $data = new Cliente();

    $id = $_GET['cliente_id'];
    $data->setClienteId($id);

    $record = $data->selectOne();
  

    $val = $record[0]; 
    

    if(isset($_POST['editar'])){

        $data-> setClienteCelular($_POST['celular']);
        $data-> setClienteCompa($_POST['compañia']);
       
        

        //INVOCAR MÉTODO
        $data->update();
        echo "<script> alert ('DATOS ACTUALIZADOS EXITOSAMENTE');document.location='cliente.php'</script>";
    }   
    
?>
<!DOCTYPE html>
<html>
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar cliente</title>
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
          <h3 style="margin-bottom: 2rem;">Clientes</h3>
          <img src="../css/clientes.png" alt="categorias" class="imagenPerfil" >
        
        </div>
        <div class="menus">
          
          <a href="../Home/home.php" style="display: flex;gap:2px;">
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
          <h2 class="m-2">MODIFICAR CLIENTE</h2>
        <div class="menuTabla contenedor2">
        <form class="col d-flex flex-wrap" action=""  method="post">
                <div class="mb-1 col-12">
                  <label for="celular" class="form-label">CELULAR</label>
                  <input 
                    type="text"
                    id="celular"
                    name="celular"
                    class="form-control" 
                    value ="<?php echo $val['cliente_celular'];?>" 
                  
                  />
                </div>
                
                <div class="mb-1 col-12">
                  <label for="compañia" class="form-label">COMPAÑIA</label>
                  <input 
                    type="text"
                    id="compañia"
                    name="compañia"
                    class="form-control"  
                    value ="<?php echo $val['cliente_compa'];?>" 
                  
                  />
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