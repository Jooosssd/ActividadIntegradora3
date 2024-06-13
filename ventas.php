<?php
require 'conexionVendedor.php';

$consulta = "SELECT * FROM venta";
$query = mysqli_query($conex, $consulta);


if (!$query) {
    echo "Error en la consulta: " . mysqli_error($conex);
} else {
    echo '<div class="contenedor_tabla">
            <table class="table" id="datos">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr id="venta_' . $row['IdVenta'] . '">
                <td>' . $row['IdVenta'] . '</td>
                <td class="editable" data-campo="IdEmpleado">' . $row['IdEmpleado'] . '</td>
                <td class="editable" data-campo="IdProducto">' . $row['IdProducto'] . '</td>
                <td class="editable" data-campo="fechaVenta">' . $row['fechaVenta'] . '</td>
                <td class="editable" data-campo="cantidadVenta">' . $row['cantidadVenta'] . '</td>
                <td class="editable" data-campo="totalVenta">' . $row['totalVenta'] . '</td>
            </tr>';
    }
    echo '    </tbody>
            </table>
          </div>';
}

?>