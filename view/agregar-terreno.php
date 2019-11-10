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
        <title>Agregar Terreno</title>
        <link href="../css/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/daliasidebar.css" rel="stylesheet">
        <link href="../css/visualizador.css" rel="stylesheet">
    </head>

    <body>
        <!-- /#Inlcuye el navbar y el menu lateral -->
        <?php include 'navbar.php';?>
        <!-- /#page-content-wrapper -->
        <form class="p-5" action="../php/registro_terreno.php" method="POST">
            <div class="form-group text-center">
                <label> Ingresar datos del terreno </label>
                <input type="text" class="form-control m-3" id="name" name="nombre" placeholder="Nombre del terreno" required>
                <input type="text" class="form-control m-3" id="time" name="largo" placeholder="Largo" required>
                <input type="text" class="form-control m-3" id="name" name="ancho" placeholder="Ancho" required>
                <input type="submit" value="Registrar terreno" class="btn btn-primary btn-block m-3">
        </form>
        <!-- /#wrapper -->
        <script src="../js/plugins/jquery/dist/jquery.min.js"></script>
        <script src="../css/plugins/bootstrap-4.3.1/js/bootstrap.min.js"></script>
        <script src="agregar.js" language="Javascript"></script>
        <!-- Menu Toggle Script -->

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>

    </html>