<?php

require_once("../login/LoginUser.php");
session_start();




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
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
                <h3> <?php echo $_SESSION['username']?></h3>
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
                <a href="../login/loginRegister.php" style="display: flex;gap:2px;color: brown;">
                    <i class="bi bi-x-square"></i>
                    <h3 style="margin: 0px;">salir</h3>
                </a>

            </div>
        </div>

        <div class="parte-media">
            <nav class="navbar navbar-expand-lg " style="background-color:#e6c7ff; border-radius: 8px">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav px-5">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item px-5">
                                <a class="nav-link active" href="#">PROMOCIONES</a>
                            </li>
                            <li class="nav-item px-5">
                                <a class="nav-link active" href="#">PRODUCTOS</a>
                            </li>
                            <li class="nav-item px-5  ">
                                <a class="nav-link active" href="#">NOSOTROS</a>
                            </li>
                            <li class="nav-item px-5  ">
                                <a class="nav-link active" href="#">CONTACTO</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav><br>

            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://laika.com.co/cdn-cgi/image/format=auto,quality=80,sharpen=1/https://laikapp.s3.amazonaws.com/dev_images_banners/b4896784c03b1c283d40e83250eb9a84_1683326806.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://laika.com.co/cdn-cgi/image/format=auto,quality=80,sharpen=1/https://laikapp.s3.amazonaws.com/dev_images_banners/097c89b0325cbcd684847b58d1a09ef7_1685737871.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://laika.com.co/cdn-cgi/image/format=auto,quality=80,sharpen=1/https://laikapp.s3.amazonaws.com/dev_images_banners/59e6c8ac91e783d2a67e6d9f6c05bfba_1685571056.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <br><br>

            <p>CATEGORIAS</p>
            <img src="../css/CATE.png" class="img-fluid" alt="...">

            <div class="container" style="width: 85%">
                <img src="../css/APP.png" class="img-fluid" alt="...">
            </div>



        </div>


        <div class="parte-derecho">
            <p>PROMOCIONES</p>
            <div class="container">
                <div class="row">
                    <div class="col"><img src="../css/p1.png" class="img-fluid" alt="..."></div>
                    <div class="col"><img src="../css/p2.png" class="img-fluid" alt="..."></div>
                </div>
            </div><br>
            <div class="container">
                <div class="row">
                    <div class="col"><img src="../css/p3.png" class="img-fluid" alt="..."></div>
                    <div class="col"><img src="../css/p4.png" class="img-fluid" alt="..."></div>
                </div>
            </div>
        </div>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- APACHE Echars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js"></script>




</body>

</html>