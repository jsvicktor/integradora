<?php

session_start();

if (empty($_SESSION["usuario"])) {
    header("Location: ../index.html");
    exit();
}
///------------Obtencion de data de cultivos 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../vendor/autoload.php";
use GuzzleHttp\Client;


$client = new Client([
  'base_uri' => 'http://localhost:3000/obtenTodosCultivos',
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

// Obtener data para los terrenos

$client = new Client([
    'base_uri' => 'http://localhost:3000/obtenTodosTerrenos',
    'timeout'  => 5.0,
  ]);
  
  $array_data1[]=array();
  $dtaCultivo=['nombre'=> 'mosca'
            ];
  
  $res = $client->request('GET', '', ['form_params' => $dtaCultivo]);
  if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
  {
  
    $resultados=json_decode($res->getBody());
    $i=0;
    while($resultados->{'nombre'}[$i]){
      array_push($array_data1,($resultados->{'nombre'}[$i]->{'nombre'}));
      //print_r($resultados->{'nombre'}[$i]->{'nombre'});
      //echo "<br/>";
      $i++;
    }
  }

  unset($array_data[0]);
  unset($array_data1[0]); 
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Agregar Cultivo</title>
        <link href="../css/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/daliasidebar.css" rel="stylesheet">
        <link href="../css/visualizador.css" rel="stylesheet">
    </head>

    <body>
        <!-- /#Inlcuye el navbar y el menu lateral -->
        <?php include 'navbar.php';?> 
        <!-- /#page-content-wrapper -->
        <form class="p-5" action="../php/registro_siembra.php" method="POST">
            <div class="form-group text-center">
            <label> Ingresar datos para iniciar una nueva produción </label>
            <input type="text" class="form-control m-3" id="name" name="nomProduccion" placeholder="Nombre de la producción " required>

            <select class="custom-select m-3" name="cultivo">
                <option selected>Seleccionar plantas</option>
                <?php
                foreach($array_data as $key => $value):
                    echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                    endforeach;
                ?>

            </select>
            <select class="custom-select m-3" name="terreno">
                <option selected>Seleccionar terrenos</option>
                <?php
                foreach($array_data1 as $key => $value):
                    echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                    endforeach;
                ?>

            </select>
            <input type="text" class="form-control m-3" id="name" name="inicio" placeholder="Fecha de inicio de la siembra">
            <input type="text" class="form-control m-3" id="name" name="NumPlantas" placeholder="Numero de plantas ">

            <input type="submit" value="Registrar producción" class="btn btn-primary btn-block m-3">


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