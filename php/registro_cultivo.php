<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$nombre = $_POST["nombre"];
$variedad = $_POST["variedad"];
$plaga = $_POST["plaga"];
$apariencia = $_POST["apariencia"];
$discEnTrPlan = $_POST["discEnTrPlan"];
$discEntrSurc = $_POST["discEntrSurc"];
$dias = $_POST["dias"];
$cantIniPlan = $_POST["cantIniPlan"];
//$terreno = $_POST["terreno"];
$temperatura = $_POST["temperatura"];
$luminosidad = $_POST["luminosidad"];
$humedad = $_POST["humedad"];
$usuario = "Victor";
$fecha = date("F j, Y, g:i a");
$aplica = "Aplicacion Web";
//$direccion = $_POST["direccion"];
//Llamada a la api
$client = new Client([
  'base_uri' => 'http://localhost:3000/registraCultivo',
  'timeout'  => 5.0,
]);


$dtaCultivo=['nombre'=> $nombre,
           'variedad'=>$variedad,
           'plaga'=>$plaga,
           'apariencia'=>$apariencia,
           //'tiempo'=>$tiempo,
           'discEnTrPlan'=>$discEnTrPlan,
           'discEntrSurc'=>$discEntrSurc,
           'dias'=>$dias,
           'cantIniPlan'=>$cantIniPlan,
           //'terreno'=>$terreno,
           'temperatura'=>$temperatura,
           'luminosidad'=>$luminosidad,
           'humedad'=>$humedad,
           'usuario'=>$usuario,
           'fecha'=>$fecha,
           'aplica'=>$aplica
          ];

$res = $client->request('POST', '', ['form_params' => $dtaCultivo]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  echo"<script>alert('Se ha ingresado un cultivo correctamente');  window.location= '../view/principal.php'</script>";

}

?>