<?php

//conexion a la base de datos con atributo PDO 
$host = "localhost";
$usuario= "root";
$contraseña = "";

try {
   $conexion1 = new PDO("mysql:host=$host;dbname=sis_venta", $usuario, $contraseña);
   $conexion1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexion1->exec("set names utf8");
    return$conexion1;
    }
catch(PDOException $error)
    {
    echo "No se pudo conectar a la BD: " . $error->getMessage();
    }

?>