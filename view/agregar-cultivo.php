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
        <title>Agregar cultivo</title>
        <link href="../css/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/daliasidebar.css" rel="stylesheet">

        <script>
            $(document).ready(function() {
                $('#fecha').datepicker()
            });
        </script>
    </head>

    <body>
        <!-- /#Inlcuye el navbar y el menu lateral -->
        <?php include 'navbar.php';?>
        <!-- /#page-content-wrapper -->
        <form class="p-5">
            <div class="form-group text-center">
                <label> Ingresar datos del cultivo </label>
                <input type="text" class="form-control m-3" id="name" name="nombre" placeholder="Nombre del cultivo">
                <input type="text" class="form-control m-3" id="time" name="tiempo" placeholder="Variedades">
                <select class="custom-select m-3">
                <option selected>Plagas del cultivo</option>
                <option value="1">Recuperarlas despues del registro</option>
                <option value="2">Recuperarlas despues del registro</option>
                <option value="3">Recuperarlas despues del registro</option>
              </select>
                <label> Apartado de siembra</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control m-3" placeholder="Distancia ancho">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control m-3" placeholder="Distancia largo">
                    </div>
                </div>

                fecha inicio fecha estimada
                <input type="text" class="form-control m-3" id="time" name="tiempo" placeholder="Cantidad inicial de platas"> 
                cuadricula
                <label for="customRange3 m-3">Temperatura en grados centigrados</label>
                <input type="range" class="custom-range m-3" min="0" max="50" step="1" id="customRange1">
                <input type="text" class="form-control m-3" id="time" name="tiempo" placeholder="Temperatura">


                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control m-3" placeholder="Luminosidad">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control m-3" placeholder="Humedad relativa ">
                    </div>
                </div>

                <input type="submit" value="Registrar cultivo" class="btn btn-primary btn-block m-3">
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