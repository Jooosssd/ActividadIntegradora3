<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $idVenta = $_POST['id'];
    
    // Aquí puedes colocar las consultas para eliminar registros relacionados y luego el registro de venta
    
    // Consulta para eliminar venta
    $consultaEliminarVenta = "DELETE FROM venta WHERE idVenta = '$idVenta'";
    $resultadoEliminarVenta = mysqli_query($conex, $consultaEliminarVenta);

    if ($resultadoEliminarVenta) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conex);
    }
} else {
    echo "No se recibió el ID de la venta.";
}
?>
