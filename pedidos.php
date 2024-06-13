<?php
require 'conexionAdmin.php';

$consulta = "SELECT * FROM pedido";
$query = mysqli_query($conex, $consulta);


if (!$query) {
    echo "Error en la consulta: " . mysqli_error($conex);
} else {
    echo '<div class="contenedor_tabla">
            <table class="table" id="datos">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Cantidad Pedida</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Fecha de Entrega</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr id="pedido_' . $row['IdPedido'] . '">
                <td>' . $row['IdPedido'] . '</td>
                <td class="editable" data-campo="IdProducto">' . $row['IdProducto'] . '</td>
                <td class="editable" data-campo="IdProveedor">' . $row['IdProveedor'] . '</td>
                <td class="editable" data-campo="cantidadP">' . $row['cantidadP'] . '</td>
                <td class="editable" data-campo="costoP">' . $row['costoP'] . '</td>
                <td class="editable" data-campo="fechaEntregaP">' . $row['fechaEntregaP'] . '</td>
                <td class="editable" data-campo="totalPedido">' . $row['totalPedido'] . '</td>            
                <td class="acciones">
                    <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono">
                    <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarProducto(' . $row['IdPedido'] . ')">
                </td>
            </tr>';
    }
    echo '    </tbody>
            </table>
          </div>';
}

?>