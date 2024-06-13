<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $idProveedor = $_POST['id'];
    
    // Aquí puedes colocar las consultas para eliminar registros relacionados y luego el registro de proveedor
    
    // Consulta para eliminar proveedor
    $consultaEliminarProveedor = "DELETE FROM proveedor WHERE idProveedor = '$idProveedor'";
    $resultadoEliminarProveedor = mysqli_query($conex, $consultaEliminarProveedor);

    if ($resultadoEliminarProveedor) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conex);
    }
} else {
    echo "No se recibió el ID del proveedor.";
}
?>
