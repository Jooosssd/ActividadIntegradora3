<?php
require 'conexionAdmin.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $empleado = $_POST['IdEmpleado'];
    $producto = $_POST['IdProducto'];
    $fecha = $_POST['fechaVenta'];
    $cantidad = $_POST['cantidadVenta'];
    $total = $_POST['totalVenta'];

    // Aseguramos la entrada de datos
    $id = mysqli_real_escape_string($conex, $id);
    $empleado = mysqli_real_escape_string($conex, $empleado);
    $producto = mysqli_real_escape_string($conex, $producto);
    $fecha = mysqli_real_escape_string($conex, $fecha);
    $cantidad = mysqli_real_escape_string($conex, $cantidad);
    $total = mysqli_real_escape_string($conex, $total);

    $consulta = "UPDATE venta SET 
                 IdEmpleado = '$empleado', 
                 IdProducto = '$producto', 
                 fechaVenta = '$fecha', 
                 cantidadVenta = '$cantidad', 
                 totalVenta = '$total' 
                 WHERE IdVenta = $id";

    if (mysqli_query($conex, $consulta)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conex);
    }
}
?>
