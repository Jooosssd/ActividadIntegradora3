<?php
require '../conexionAdmin.php';

$query = "SELECT MAX(IdFactura) AS max_id FROM factura";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$new_id = $max_id + 1;

$IdCliente = $_POST['IdPedido'];
$fechaFactura = $_POST['fechaFactura'];
$totalFactura = $_POST['totalFactura'];

$query = "INSERT INTO factura (IdFactura, IdPedido, fechaFactura, totalFactura) VALUES ('$new_id', '$IdCliente', '$fechaFactura', '$totalFactura')";

if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    echo 'error';
}
?>
