<?php
require 'conexionAdmin.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $producto = $_POST['IdProducto'];
    $proveedor = $_POST['IdProveedor'];
    $cantidad = $_POST['cantidadP'];
    $costo = $_POST['costoP'];
    $fechaEntrega = $_POST['fechaEntregaP'];
    $total = $_POST['totalPedido'];

    // Aseguramos la entrada de datos
    $id = mysqli_real_escape_string($conex, $id);
    $producto = mysqli_real_escape_string($conex, $producto);
    $proveedor = mysqli_real_escape_string($conex, $proveedor);
    $cantidad = mysqli_real_escape_string($conex, $cantidad);
    $costo = mysqli_real_escape_string($conex, $costo);
    $fechaEntrega = mysqli_real_escape_string($conex, $fechaEntrega);
    $total = mysqli_real_escape_string($conex, $total);

    $consulta = "UPDATE pedido SET 
                 IdProducto = '$producto', 
                 IdProveedor = '$proveedor', 
                 cantidadP = '$cantidad', 
                 costoP = '$costo', 
                 fechaEntregaP = '$fechaEntrega', 
                 totalPedido = '$total' 
                 WHERE IdPedido = $id";

    if (mysqli_query($conex, $consulta)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conex);
    }
}
?>
