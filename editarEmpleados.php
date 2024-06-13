<?php
require 'conexionAlmacen.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $telefono = $_POST['telefonoE'];
    $puesto = $_POST['puestoE'];
    $rango = $_POST['rangoE'];
    $salario = $_POST['salarioE'];

    $consulta = "UPDATE producto SET telefonoE= '$telefono', puestoE = '$puesto', rangoE = '$rango', salarioE = '$salario' WHERE IdEmpleado = $id";

    if (mysqli_query($conex, $consulta)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>