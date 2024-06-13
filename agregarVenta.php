<?php
require '../conexionAdmin.php';

$query = "SELECT MAX(IdVenta) AS max_id FROM venta";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$new_id = $max_id + 1;

$IdEmpleado = $_POST['IdEmpleado'];
$IdProducto = $_POST['IdProducto'];
$fechaVenta = $_POST['fechaVenta'];
$cantidadVenta = $_POST['cantidadVenta'];
$totalVenta = $_POST['totalVenta'];

$query = "INSERT INTO venta (IdVenta, IdEmpleado, IdProducto, fechaVenta, cantidadVenta, totalVenta) VALUES ('$new_id', '$IdEmpleado', '$IdProducto', '$fechaVenta', '$cantidadVenta', '$totalVenta')";

if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    echo 'error';
}
?>
