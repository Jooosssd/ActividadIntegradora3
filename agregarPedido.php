<?php
require '../conexionAdmin.php';

$query = "SELECT MAX(IdPedido) AS max_id FROM pedido";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$new_id = $max_id + 1;

$IdProducto = $_POST['IdProducto'];
$IdProveedor = $_POST['IdProveedor'];
$cantidadP = $_POST['cantidadP'];
$costoP = $_POST['costoP'];
$fechaEntregaP = $_POST['fechaEntregaP'];
$totalPedido = $_POST['totalPedido'];

$query = "INSERT INTO pedido (IdPedido, IdProducto, IdProveedor, cantidadP, costoP, fechaEntregaP, totalPedido) VALUES ('$new_id', '$IdProducto', '$IdProveedor', '$cantidadP', '$costoP', '$fechaEntregaP', '$totalPedido')";

if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    echo 'error';
}
?>
