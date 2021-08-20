<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Origin: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow: Content-Type, Access-Control-Allow-Headers, Authorization X-Requested, X-Request-Width");
//Conecta a la base de datos con usuario, contrseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "emplados";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos;