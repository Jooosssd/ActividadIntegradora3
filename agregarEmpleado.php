<?php
// Conexión a la base de datos
require '../conexionAdmin.php';

// Verificar si se están recibiendo los datos esperados
if (!isset($_POST['nomEmpleado'], $_POST['apellidoPE'], $_POST['apellidoME'], $_POST['telefonoE'], $_POST['puestoE'], $_POST['rangoE'], $_POST['salarioE'])) {
    http_response_code(400); // Bad Request
    echo 'Faltan parámetros requeridos';
    exit;
}

// Limpiar y escapar los datos recibidos
$nomEmpleado = mysqli_real_escape_string($conex, $_POST['nomEmpleado']);
$apellidoPE = mysqli_real_escape_string($conex, $_POST['apellidoPE']);
$apellidoME = mysqli_real_escape_string($conex, $_POST['apellidoME']);
$telefonoE = mysqli_real_escape_string($conex, $_POST['telefonoE']);
$puestoE = mysqli_real_escape_string($conex, $_POST['puestoE']);
$rangoE = mysqli_real_escape_string($conex, $_POST['rangoE']);
$salarioE = mysqli_real_escape_string($conex, $_POST['salarioE']);

// Query para insertar datos en la tabla empleado
$query = "INSERT INTO empleado (nomEmpleado, apellidoPE, apellidoME, telefonoE, puestoE, rangoE, salarioE) 
          VALUES ('$nomEmpleado', '$apellidoPE', '$apellidoME', '$telefonoE', '$puestoE', '$rangoE', '$salarioE')";

// Ejecutar la consulta y verificar el resultado
if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    http_response_code(500); // Internal Server Error
    echo 'Error al agregar el registro en la tabla: ' . mysqli_error($conex);
}

// Cerrar la conexión
mysqli_close($conex);
?>
