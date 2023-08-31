<?php
//Variables: $nombrevariable;
//Para la conexion necesitamos 4 parametros:
// El servidor,Usuario, Contraseña y Nombre de la base de datoa
// 

$servidor = "localhost";
$user = "root"; //root es el usuario por defecto
$password = "";
$basedatos = "bdfactura";

$conexion = new mysqli($servidor, $user, $password, $basedatos); //Ya la conexion esta lista

//Comprobar si existe algun error de conexion

if ($conexion -> connect_errno){  //Esta funcion verifica errores de conectividad

    die("Error: ".$conexion-> connect_errno);
    /* echo "Nuestra conexion presenta fallas";
    exit(); */

};

?>