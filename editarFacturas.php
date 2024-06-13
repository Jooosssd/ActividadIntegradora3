<?php
require 'conexionAdmin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IdFactura = $_POST['IdFactura '];
    $IdPedido = $_POST['IdPedido'];
    $fechaFact = $_POST['fechaFact'];
    $totalFact = $_POST['totalFact'];

    $consulta = "UPDATE factura SET fechaFact = ?, totalFact = ? WHERE IdFactura = ?";
    
    $stmt = mysqli_prepare($conex, $consulta);

    if ($stmt === false) {
        echo 'error';
    } else {
        mysqli_stmt_bind_param($stmt, 'sssdi', $fechaFact, $totalFact, $IdFactura);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
} else {
    echo 'error';
}
?>