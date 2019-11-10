<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$nomProduccion = $_POST["nomProduccion"];
$nomCultivo = $_POST["cultivo"];
$nomTerreno = $_POST["terreno"];
$inicio = $_POST["inicio"];
$plantas=$_POST["NumPlantas"];
$usuario="Victor";
$fecha= date("F j, Y, g:i a");
$aplica="Aplicacion Web";
//$direccion = $_POST["direccion"];
//Llamada a la api


$client = new Client([
    'base_uri' => 'http://localhost:3000/registraProduccion',
    'timeout'  => 5.0,
  ]);
  
  
  $dtaCultivo=['nomProduccion'=> $nomProduccion,
             'nomCultivo'=>$nomCultivo,
             'nomTerreno'=>$nomTerreno,
             'cantPlantas'=>$plantas
            ];
  
  $res = $client->request('POST', '', ['form_params' => $dtaCultivo]);
  if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
  {
    echo"<script>alert('Se ha registrado una produccion correctamente');  window.location= '../view/principal.php'</script>";
  
  }
?>
