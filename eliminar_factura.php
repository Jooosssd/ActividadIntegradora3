<?php
require 'conexionAdmin.php';

if (isset($_POST['id'])) {
    $idFactura = $_POST['id'];
    

    $consultaEliminarFactura = "DELETE FROM factura WHERE idFactura = '$idFactura'";
    $resultadoEliminarFactura = mysqli_query($conex, $consultaEliminarFactura);

    if ($resultadoEliminarFactura) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conex);
    }
} else {
    echo "No se recibió el ID de la factura.";
}
?>
