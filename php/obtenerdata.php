<?php
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
    //array_push($array_data,($resultados->{'nombre'}[$i]->{'nombre'}));
    print_r($resultados->{'nombre'}[$i]->{'nombre'});
    echo "<br/>";
    $i++;
  }
}

?> 