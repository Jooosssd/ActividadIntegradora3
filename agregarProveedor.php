<?php
require '../conexionAdmin.php';

$query = "SELECT MAX(IdProveedor) AS max_id FROM proveedor";
$result = mysqli_query($conex, $query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$new_id = $max_id + 1;

$nomProv = $_POST['nomProv'];
$apellidoPP = $_POST['apellidoPP'];
$apellidoMP = $_POST['apellidoMP'];
$ubicacionProv = $_POST['ubicacionProv'];
$telefonoProv = $_POST['telefonoProv'];

$query = "INSERT INTO proveedor (IdProveedor, nomProv, apellidoPP, apellidoMP, ubicacionProv, telefonoProv) VALUES ('$new_id', '$nomProv', '$apellidoPP', '$apellidoMP', '$ubicacionProv')";

if (mysqli_query($conex, $query)) {
    echo 'success';
} else {
    echo 'error';
}
?>
