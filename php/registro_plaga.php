<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$nombre = $_POST["nombre"];
$ciclo = $_POST["tiempo"];
$huevecillos = $_POST["huevecillos"];
$apariencia = $_POST["apariencia"];
$imagen="Pendiente";
$usuario="Victor";
$fecha= date("F j, Y, g:i a");
$aplica="Aplicacion Web";
//$direccion = $_POST["direccion"];
//Llamada a la api
$client = new Client([
  'base_uri' => 'http://localhost:3000/registraPlaga',
  'timeout'  => 5.0,
]);


$dtaPlaga=['nombre'=> $nombre,
           'ciclo'=>$ciclo,
           'huevecillos'=>$huevecillos,
           'apariencia'=>$apariencia,
           'imagen'=>$imagen,
           'usuario'=>$usuario,
           'fecha'=>$fecha,
           'aplica'=>$aplica
          ];

$res = $client->request('POST', '', ['form_params' => $dtaPlaga]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo"<script>alert('Se ha ingresado una plaga correctamente');  window.location= '../view/principal.php'</script>";

}

?>