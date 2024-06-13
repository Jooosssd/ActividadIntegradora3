<?php
require 'conexionAdmin.php';

$consulta = "SELECT * FROM proveedor"; 
$query = mysqli_query($conex, $consulta);

if (!$query) {
    echo "Error en la consulta: " . mysqli_error($conex);
} else {
    echo '<div class="contenedor_tabla">
            <table class="table" id="datos">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido P</th>
                        <th scope="col">Apellido M</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr id="proveedor_' . $row['IdProveedor'] . '">
                <td>' . $row['IdProveedor'] . '</td>
                <td class="editable" data-campo="nomProv">' . $row['nomProv'] . '</td>
                <td class="editable" data-campo="apellidoPP">' . $row['apellidoPP'] . '</td>
                <td class="editable" data-campo="apellidoMP">' . $row['apellidoMP'] . '</td>
                <td class="editable" data-campo="ubicacionProv">' . $row['ubicacionProv'] . '</td>
                <td class="acciones">
                    <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono">
                    <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarProducto(' . $row['IdProveedor'] . ')">
                </td>
            </tr>';
    }
    echo '    </tbody>
            </table>
          </div>';
}
?>
