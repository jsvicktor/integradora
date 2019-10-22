<?php
require "../vendor/autoload.php";
//include_once('conexion.php');
use GuzzleHttp\Client;

$usuario = $_POST["username"];
$contrasenia = $_POST["password"];

$client = new Client([
  'base_uri' => 'http://localhost:3000/login',
  'timeout'  => 5.0,
]);

$dtaUser = ['email'=>$usuario,
             'password'=>$contrasenia
            ];
            
$res = $client->request('POST', '', ['form_params' => $dtaUser]);
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
  $result =  json_decode($res->getBody(), true);
  
  if ($result=="Login exitoso"){

    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: ../view/principal.php");
  } else {
        echo "El usuario o la contraseña son incorrectos";
       header("Location: ../index.html");
  }
}






?>