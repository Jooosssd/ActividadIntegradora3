<?php
require '../conexionAlmacen.php';

$query = "SELECT MAX(IdProducto) AS max_id FROM producto";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$new_id = $max_id + 1;

$marcaProd = $_POST['marcaProd'];
$existenciasProd = $_POST['existenciasProd'];
$precioPublico = $_POST['precioPublico'];

$query = "INSERT INTO producto (IdProducto, marcaProd, existenciasProd, precioPublico) VALUES ('$new_id', '$marcaProd', '$existenciasProd', '$precioPublico')";

if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    echo 'error';
}
?>
