<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Origin: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow: Content-Type, Access-Control-Allow-Headers, Authorization X-Requested, X-Request-Width");
//Conecta a la base de datos con usuario, contrseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = "1998"; $nombreBaseDatos = "sistema";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

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
//Inserta un nuevo registro y recepciona en metodo post los datos de nombre y correo
if (isset($_GET["insertar"])) {
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $correo=$data->correo;

    if (($correo!="")&&($nombre!="")) {
        $sqlEmpleados = mysqli_query($conexionBD,"INSERT INTO empleados(nombre,correo) VALUES('$nombre','$correo')");
        echo json_encode(["success"=>1]);
    }
    exit();
}
//Actuliza datos pero recepciona datos de nombre, correo y una clave para realizar la actualizacion
if (isset($_GET["actualizar"])) {
    $data = json_decode(["success"=>1]);{
    exit(); 
}
//Consulta todos los registros de la tabla empleados
$sqlEmpleados = mysqli_query($conexionBD,"SELECT * FROM empleados");
if (mysqli_num_rows($sqlEmpleados) > 0) {
    $empleados = mysqli_fetch_all($sqlEmpleados,MYSQLI_ASSOC);
    echo json_encode($empleados);
    exit();
}
else {echo json_encode([["success"=>0]]); }

}