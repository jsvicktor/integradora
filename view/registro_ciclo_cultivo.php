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
                <label> Ingresar datos del ciclo del cultivo </label>
                <select class="custom-select m-3">
                <option selected>Fecha de inicio</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <select class="custom-select m-3">
                <option selected>Fecha fin</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                <input type="text" class="form-control m-3" id="username" name="numero" placeholder="Digite la cantidad de plantas ">
                <select class="custom-select m-3">
                <option selected>Tipo de plaga</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              
                          

              <div class="row">
                    <div class="col">
                        <input type="button" value="Cancelar" class="btn btn-primary btn-block">
                    </div>
                    <div class="col">
                        <input type="submit" value="Siguiente" class="btn btn-primary btn-block">
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