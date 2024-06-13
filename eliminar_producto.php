<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $idProducto = $_POST['id'];
    $consultaObtenerPedidos = "SELECT IdPedido FROM pedido WHERE IdProducto = '$idProducto'";
    $resultadoObtenerPedidos = mysqli_query($conex, $consultaObtenerPedidos);

    if ($resultadoObtenerPedidos) {
        while ($pedido = mysqli_fetch_assoc($resultadoObtenerPedidos)) {
            $idPedido = $pedido['IdPedido'];


            $consultaEliminarFacturas = "DELETE FROM factura WHERE IdPedido = '$idPedido'";
            $resultadoEliminarFacturas = mysqli_query($conex, $consultaEliminarFacturas);

            if (!$resultadoEliminarFacturas) {
                echo "error: " . mysqli_error($conex);
                exit;
            }
        }


        $consultaEliminarPedidos = "DELETE FROM pedido WHERE IdProducto = '$idProducto'";
        $resultadoEliminarPedidos = mysqli_query($conex, $consultaEliminarPedidos);

        if ($resultadoEliminarPedidos) {

            $consultaEliminarProducto = "DELETE FROM producto WHERE IdProducto = '$idProducto'";
            $resultadoEliminarProducto = mysqli_query($conex, $consultaEliminarProducto);

            if ($resultadoEliminarProducto) {
                echo "success";
            } else {
                echo "error: " . mysqli_error($conex);
            }
        } else {
            echo "error: " . mysqli_error($conex);
        }
    } else {
        echo "error: " . mysqli_error($conex);
    }
} else {
    echo "No se recibió el ID del producto.";
}
?>
