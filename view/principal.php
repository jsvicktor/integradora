<?php

session_start();

if (empty($_SESSION["usuario"])) {
    header("Location: ../index.html");
    exit();
}

///------------Obtencion de data para la produccion 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../vendor/autoload.php";
use GuzzleHttp\Client;


$client = new Client([
  'base_uri' => 'http://localhost:3000/obtenTodosProduccion',
  'timeout'  => 5.0,
]);

$array_data_nombre[]=array();
$array_data_cultivo[]=array();
$array_data_terreno[]=array();
$dtaCultivo=['nombre'=> 'mosca'
          ];

$res = $client->request('GET', '', ['form_params' => $dtaCultivo]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{

  $resultados=json_decode($res->getBody());
  $i=0;
  while($resultados->{'nombre'}[$i]){
    array_push($array_data_nombre,($resultados->{'nombre'}[$i]->{'nomProduccion'}));
    array_push($array_data_cultivo,($resultados->{'nombre'}[$i]->{'nomCultivo'}));
    array_push($array_data_terreno,($resultados->{'nombre'}[$i]->{'nomTerreno'}));

    //print_r($resultados->{'nombre'}[$i]->{'nombre'});
    //echo "<br/>";
    $i++;
  }
}
unset($array_data_nombre[0]);
unset($array_data_cultivo[0]);
unset($array_data_terreno[0]);


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

        <div class="card-deck p-5">


            <div class="container">
                <div class="row-fluid ">
                    <!-- my php code which uses x-path to get results from xml query. -->
                    <?php foreach ( $array_data_nombre as $elements => $value) : ?>
                    <div class="card">
                        <div class="card-header"> Nombre de cultivo:<?php echo $array_data_nombre[$elements ]?>                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Plantas cultivadas:
                                <?php echo $array_data_cultivo[$elements ]?>
                            </h5>
                            <p class=hbb "card-text">Terreno en el cual se cultiva:
                                <?php echo $array_data_terreno[$elements ]?> </p>
                            <a href="detalles-siembra.php?nomSiembra=<?php echo $array_data_nombre[$elements ]?>&nomCultivo=<?php echo $array_data_cultivo[$elements ]?>&nomTerreno=<?php echo $array_data_terreno[$elements ]?>" class="btn btn-primary"> Ver mas del cultivo </a>
                        </div>
                    </div>
                    <br>

                    <?php endforeach; ?>
                </div>
            </div>
            <!--container div  -->


            <!-- <div class="card">
                <img class="card-img-top" src="../assets/Lechuga.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cultivo de lechuga</h5>
                    <p class="card-text">Variedad: Italiana</p>
                    <p class="card-text"><small class="text-muted">Iniciado el 01 de Octubre</small></p>
                </div>
            </div> -->
        </div>
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