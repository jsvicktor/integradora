<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$nombre = $_POST["nombre"];
$largo = $_POST["largo"];
$ancho = $_POST["ancho"];
$usuario="Victor";
$fecha= date("F j, Y, g:i a");
$aplica="Aplicacion Web";
//$direccion = $_POST["direccion"];
//Llamada a la api
$client = new Client([
  'base_uri' => 'http://localhost:3000/registraTerreno',
  'timeout'  => 5.0,
]);


$dtaterreno=['nombre'=> $nombre,
           'largo'=>$largo,
           'ancho'=>$ancho,
           'usuario'=>$usuario,
           'fecha'=>$fecha,
           'aplica'=>$aplica
          ];

$res = $client->request('POST', '', ['form_params' => $dtaterreno]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo"<script>alert('Se ha ingresado un terreno correctamente');  window.location= '../view/principal.php'</script>";

}

?>