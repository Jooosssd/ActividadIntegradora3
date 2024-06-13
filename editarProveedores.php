<?php
require 'conexionAdmin.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nomProv'];
    $apellidoP = $_POST['apellidoPP'];
    $apellidoM = $_POST['apellidoMP'];
    $ubicacion = $_POST['ubicacionProv'];

    // Aseguramos la entrada de datos
    $id = mysqli_real_escape_string($conex, $id);
    $nombre = mysqli_real_escape_string($conex, $nombre);
    $apellidoP = mysqli_real_escape_string($conex, $apellidoP);
    $apellidoM = mysqli_real_escape_string($conex, $apellidoM);
    $ubicacion = mysqli_real_escape_string($conex, $ubicacion);

    $consulta = "UPDATE proveedor SET 
                 nomProv = '$nombre', 
                 apellidoPP = '$apellidoP', 
                 apellidoMP = '$apellidoM', 
                 ubicacionProv = '$ubicacion' 
                 WHERE IdProveedor = $id";

    if (mysqli_query($conex, $consulta)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conex);
    }
}
?>
