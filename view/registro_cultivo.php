<?php

session_start();

if (empty($_SESSION["usuario"])) {
    header("Location: ../index.html");
    exit();
}
?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="../css/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/daliasidebar.css" rel="stylesheet">
    </head>

    <body>
        <!-- /#Inlcuye el navbar y el menu lateral -->
        <?php include 'navbar.php';?>
        <!-- /#page-content-wrapper -->
        <form class="p-5">
            <div class="form-group text-center">
                <label> Ingresar datos de cultivo </label>
                <select class="custom-select m-3">
                <option selected>Nombre</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Grupo varietal</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Variedades</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>clasificacion botanica</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Temperatura</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Luminosidad</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Humedad relativa</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>

              <div class="row">
                    <div class="col">
                        <input type="button" value="Cancelar" class="btn btn-primary btn-block">
                    </div>
                    <div class="col">
                        <input type="submit" value="Siguiente" href="registro_ciclo_cultivo.php" class="btn btn-primary btn-block">
                    </div>
                </div>


              
              
            </div>


        </form>









        <!-- /#wrapper -->




        <script src="../js/plugins/jquery/dist/jquery.min.js"></script>
        <script src="../css/plugins/bootstrap-4.3.1/js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

    </body>

    </html>