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
            <label > Ingresar datos de la plaga </label>
              <input type="text" class="form-control m-3" id="name" name="nombre" placeholder="Nombre de la plaga">
              <input type="text" class="form-control m-3" id="time" name="tiempo" placeholder="Duracion del ciclo biologico">
              <input type="text" class="form-control m-3" id="name" name="Aparie" placeholder="Nombre de la plaga">
              <textarea class="form-control m-3" id="description" name ="apariencia" placeholder =" Escriba una descripcion de la plaga"rows="3"></textarea>

  
              <input type="submit" value="Registrar plaga" class="btn btn-primary btn-block">
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