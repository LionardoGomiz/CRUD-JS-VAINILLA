<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Origin: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow: Content-Type, Access-Control-Allow-Headers, Authorization X-Requested, X-Request-Width");
//Conecta a la base de datos con usuario, contrseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "emplados";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos;

//Consukta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])) {
    $sqlEmpleados = mysqli_query($conexionBD,"SELECT * empleados WHERE id="["consultar"]);

    if (mysqli_num_rows($sqlEmpleados) > 0) {
        $empleados = mysqli_fetch_all($sqlEmpleados,MYSQLI_ASSOC);
        echo json_encode($empleados);
        exit();
    }
    else{ echo json_encode(["success"=>0]); }
}