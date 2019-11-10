<?php

//------Obtencion de sesion
session_start();

if (empty($_SESSION["usuario"])) {
    header("Location: ../index.html");
    exit();
}
///------------Obtencion de data para los cultivos 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../vendor/autoload.php";
use GuzzleHttp\Client;


$client = new Client([
  'base_uri' => 'http://localhost:3000/obtenTodasPlagas',
  'timeout'  => 5.0,
]);

$array_data[]=array();
$dtaCultivo=['nombre'=> 'mosca'
          ];

$res = $client->request('GET', '', ['form_params' => $dtaCultivo]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{

  $resultados=json_decode($res->getBody());
  $i=0;
  while($resultados->{'nombre'}[$i]){
    array_push($array_data,($resultados->{'nombre'}[$i]->{'nombre'}));
    //print_r($resultados->{'nombre'}[$i]->{'nombre'});
    //echo "<br/>";
    $i++;
  }
}

unset($array_data[0]);



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
        <form class="p-5"  action="../php/registro_cultivo.php" method="POST">
            <div class="form-group text-center">

                <label> Ingresar datos del cultivo </label>

                <input type="text" class="form-control m-3" id="name" name="nombre" placeholder="Nombre del cultivo">
                
                <input type="text" class="form-control m-3" id="time" name="variedad" placeholder="Variedades">
               
                <select class="custom-select m-3" name="plaga">
                <option selected>Plagas del cultivo</option>

                <?php
                foreach($array_data as $key => $value):
                    echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                    endforeach;
                ?>

                </select>

                <input type="text" class="form-control m-3" id="name" name="apariencia" placeholder="Apariencia">
                
                <label class="m-3"> Apartado de siembra</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control m-3" name="discEnTrPlan" placeholder="Distancia entre plantas">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control m-3" name="discEntrSurc" placeholder="Distancia entre surcos">
                    </div>
                </div>
                <input type="text" class="form-control m-3" id="name" name="dias" placeholder="Tiempo en dias">
                <input type="text" class="form-control m-3" id="name" name="cantIniPlan" placeholder="Cantidad inicial de plantas ">
                <input type="text" class="form-control m-3" id="name" name="temperatura" placeholder="Temperatura en grados centigrados">

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control m-3" name ="luminosidad" placeholder="Luminosidad">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control m-3" name="humedad" placeholder="Humedad relativa ">
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