<?php
require_once("RegistroUser.php");
$data = new RegistrarUser();
$allRol = $data->MostrarRol();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Typografia -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
   
</head>

<body>
    <div class="container-m">
        <div class="section1">
            <br><br>
           
            <div class="d-flex justify-content-center align-items-center">
                <img src="../css/perro-globo.png" alt="" class="logo">
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h1 style="font-weight: 500;" >LAIKA TE DA LA BIEVENIDA</h1>
            </div><br><br>
            <div class="d-flex justify-content-center align-items-center">
                <form action="loguearse.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control" />
                        <div id="emailHelp" class="form-text"></div>
                    </div><br>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div><br>

                    <input type="submit" class="btn btn-primary" value="loguearse" name="loguearse">
                </form>
                

</div>

        </div>
        <div class="section2" id="section2">
           


            <div class="d-flex justify-content-center align-items-center">

                <form action="registrarse.php" method="post">
                  <br><br><br><br>
                    <h1 class="m-5" style="font-weight: 500; color:whitex">REGISTRAR USUARIO</h1>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="rol" class="form-label"></label>
                        <select name="rol" id="rol" class="form-select" aria-label="Default select example">
                            <?php foreach ($allRol as $key => $val) {?>
                            <option value="<?php echo $val['id_rol']?>"><?php echo $val['nombre_rol']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="registrarse" name="registrarse">
                </form>

            </div>
           




        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


</body>

</html>