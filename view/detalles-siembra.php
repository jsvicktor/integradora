<?php

session_start();

if (empty($_SESSION["usuario"])) {
    header("Location: ../index.html");
    exit();
}

///Obtenemos el nombre de la siembra
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$nomSiembra = $_GET['nomSiembra'];
$nomCultivo = $_GET['nomCultivo'];
$nomTerreno = $_GET['nomTerreno'];

//Obtenemos la data de la siembra
require "../vendor/autoload.php";
use GuzzleHttp\Client;


$client = new Client([
  'base_uri' => 'http://localhost:3000/obtenProduccionNom',
  'timeout'  => 5.0,
]);

$valoresArray[]=array();
$timeArray[]=array();
$dtaCultivo=['nomProduccion'=> $nomSiembra
          ];

$res = $client->request('GET', '', ['form_params' => $dtaCultivo]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{

  $resultados=json_decode($res->getBody());
  $i=0;
  while($resultados->{'nombre'}[$i]){
    array_push($valoresArray,($resultados->{'nombre'}[$i]->{'incidencia'}));
    array_push($timeArray,($resultados->{'nombre'}[$i]->{'fech'}));

    //print_r($resultados->{'nombre'}[$i]->{'nombre'});
    //echo "<br/>";
    $i++;
  }
}
unset($valoresArray[0]);
unset($timeArray[0]);

?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Deatalles de la siembra
            <?php echo $nomSiembra?>
        </title>
        <link href="../css/plugins/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/daliasidebar.css" rel="stylesheet">
        <!-- Datepicker elemnts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!-- elementos para la grafica -->
        <script src="../js/plugins/chart.js/chart.min.js"></script>
    </head>

    <body>
        <!-- /#Inlcuye el navbar y el menu lateral -->
        <?php include 'navbar.php';?>
        <!-- /#page-content-wrapper -->
        <form class="m-3" action="../php/registro_incidencia.php" method="POST">
  
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>Nombre del cultivo</label>
                    <input for="disabledTextInput" type="text" class="form-control" value=<?php echo $nomSiembra ?> name="nomSiembra" >
                </div>
                <div class="col-md-4 mb-3">
                    <label>Planta cultivada</label>
                    <input for="disabledTextInput" type="text" class="form-control" value=<?php echo $nomCultivo ?> disabled >
                </div>
                <div class="col-md-4 mb-3">
                    <label>Nombre del terreno</label>
                    <input for="disabledTextInput" type="text" class="form-control" value=<?php echo $nomTerreno ?> disabled>
                </div>
            </div>
            <div class="form-group text-center">
            <label> Ingresar incidencia de las plantas </label>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">Fecha</label>
                    <input name="fech" id="datepicker" width="auto" required>
                        <script>
                            $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                            });
                        </script>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Tipo</label>
                    <select id="inputState" class="form-control" name="tipoIncide">
                        <option selected>Seleccione el tipo de plaga </option>
                        <option value="Plaga">Plaga</option>
                        <option value="Huevecillo">Huevecillo</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Porcentaje </label>
                    <input type="text" name="incidencia" class="form-control" id="inputZip" required>
                </div>
            </div>

  <button type="submit" class="btn btn-primary">Registrar incidencias </button>
</form>

<!-- diseño de grafica -->


<div id="accordion" class="m-3 text-center">
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Mostrar u ocultar gráfica de incidencia
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        
<!-- Aca intentare meter la grafica -->

<canvas class="m-3" id="chart1" style="width:100%;" width="auto"height="100"></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($timeArray as $d):?>
        "<?php echo $d?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Incidencias',
            data: [
        <?php foreach($valoresArray as $d):?>
        <?php echo $d?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#008000",
            borderColor: "#167016",
            borderWidth: 2,
            hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: '#666666',
        }]
    };
var options = {
    responsive:true,
        scales: {
            yAxes: [{
                scaleLabel: {
							display: true,
							labelString: 'Incidencias'
				},
                ticks: {
                    beginAtZero:true
                }
            }],
            xAxes: [{
                scaleLabel:{
                    display:true,
                    labelString:'Fecha'
                }
            }

            ]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'line', /* valores: line, bar*/
    data: data,
    options: options
   
});
</script>
<!-- fin de grafica saca hasta aca si esto fallas -->

      </div>
    </div>
  </div>
</div>

<!-- Fin de grafica -->

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