<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $idPedido = $_POST['id'];
    
    // Aquí puedes colocar las consultas para eliminar registros relacionados y luego el registro de pedido
    
    // Consulta para eliminar pedido
    $consultaEliminarPedido = "DELETE FROM pedido WHERE idPedido = '$idPedido'";
    $resultadoEliminarPedido = mysqli_query($conex, $consultaEliminarPedido);

    if ($resultadoEliminarPedido) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conex);
    }
} else {
    echo "No se recibió el ID del pedido.";
}
?>
