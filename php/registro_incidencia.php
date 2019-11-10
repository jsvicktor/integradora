<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$incidencia = $_POST["incidencia"];
$nomProduccion = $_POST["nomSiembra"];
$fech = $_POST["fech"];
$tipoIncide = $_POST["tipoIncide"];
$usuario="Victor";
$fecha= date("F j, Y, g:i a");
$aplica="Aplicacion Web";



// echo $incidencia;
// echo $nomProduccion ;
// echo $fech ;
// echo $tipoIncide ;


//Llamada a la api
$client = new Client([
  'base_uri' => 'http://localhost:3000/registraPlantas',
  'timeout'  => 5.0,
]);


$dtaPlaga=['nomProduccion'=> $nomProduccion,
           'fech'=>$fech,
           'incidencia'=>$incidencia,
           'tipoIncide'=>$tipoIncide
          ];

$res = $client->request('POST', '', ['form_params' => $dtaPlaga]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo"<script>alert('Se ha guardado la plaga correctamente');  window.location= '../view/principal.php'</script>";

}

?>