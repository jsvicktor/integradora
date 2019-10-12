<?php
include_once 'functions.php';
/**
 * Clase que contiene funciones útiles sobre la funcionalidad del programa 
 * 
 * @author   Victor R. Jose Santiago
 * @license  IntegradoraWeBApp
 *
 */
class Tools{
    /**
     * Devuelve una instancia de la conexión a la base de datos
     * @return type
     */
    function connectDB(){
        
        $conexion = mysqli_connect(SERVER, USER, PASS, DB);
        if($conexion){
        }else{
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }
        mysqli_query ($conexion,"SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");
        return $conexion;
    }
    /**
     * Desconecta la base de datos a partir de la instancia que le pasamos
     * @param type $conexion
     * @return type
     */
    function disconnectDB($conexion){
       $close = mysqli_close($conexion);
                if($close){
                }else{
                    echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
                }   
        return $close;
    }