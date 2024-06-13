<?php
require 'conexionAdmin.php';

if (isset($_POST['id'])) {
    $idEmpleado = intval($_POST['id']);

    // Delete related records in venta table
    $consulta = "DELETE FROM venta WHERE IdEmpleado = $idEmpleado";
    $result = mysqli_query($conex, $consulta);

    if (!$result) {
        echo "Error al eliminar registros relacionados en venta: ". mysqli_error($conex);
    } else {
        // Delete employee record
        $consulta = "DELETE FROM empleado WHERE IdEmpleado = $idEmpleado";
        $result = mysqli_query($conex, $consulta);

        if ($result) {
            echo "success";
        } else {
            echo "Error al eliminar empleado: ". mysqli_error($conex);
        }
    }
} else {
    echo "No se proporcionó un ID de empleado válido.";
}
?>