<?php
require "../vendor/autoload.php";
use GuzzleHttp\Client;

//Parametros que se reciben del formulario
$usuario = $_POST["username"];
$contrasenia = $_POST["password"];

//Llamada a la api
$client = new Client([
  'base_uri' => 'http://localhost:3000/login',
  'timeout'  => 5.0,
]);

//Cracion de los datos a enviar a la api
$dtaUser = ['email'=>$usuario,
             'password'=>$contrasenia
            ];
            
//Resultados de la condulta a la api        
$res = $client->request('POST', '', ['form_params' => $dtaUser]);
if ($res->getStatusCode() == '200') 
{
  //Resultados del retorno de la api.
  $result =  json_decode($res->getBody(), true);
  
  if ($result=="Login exitoso"){
    //Logueado correctamente
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: ../view/principal.php");
  } else {
       //Rechazo de login.
       echo"<script>alert('Usuario o contraseña incorrectos');  window.location= '../index.html'</script>";
      // header("Location: ../index.html");
  }
}
?>