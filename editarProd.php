<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $marca = $_POST['marcaProd'];
    $cantidad = $_POST['existenciasProd'];
    $precio = $_POST['precioPublico'];

    $consulta = "UPDATE producto SET marcaProd = '$marca', existenciasProd = '$cantidad', precioPublico = '$precio' WHERE IdProducto = $id";

    if (mysqli_query($conex, $consulta)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
