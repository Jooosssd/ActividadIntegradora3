<?php
require 'conexionAdmin.php';

$consulta = "SELECT * FROM factura";
$query = mysqli_query($conex, $consulta);


if (!$query) {
    echo "Error en la consulta: " . mysqli_error($conex);
} else {
    echo '<div class="contenedor_tabla">
            <table class="table" id="datos">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Pedido</th>
                        <th scope="col">Fecha de factura</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr id="factura_' . $row['IdFactura'] . '">
                <td>' . $row['IdFactura'] . '</td>
                <td class="editable" data-campo="IdPedido">' . $row['IdPedido'] . '</td>
                <td class="editable" data-campo="fechafact">' . $row['fechaFact'] . '</td>
                <td class="editable" data-campo="totalFact">' . $row['totalFact'] . '</td>
                <td class="acciones">
                    <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono">
                    <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarFactura(' . $row['IdFactura'] . ')">
                </td>
            </tr>';
    }
    echo '    </tbody>
            </table>
          </div>';
}

?>