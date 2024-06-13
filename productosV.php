<div class="contenedor_tabla">
    <table class="table" id="datos">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Empleado</th>
                <th scope="col">Producto</th>
                <th scope="col">Marca</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody id="datos">
            <?php
            require 'conexionAlmacen.php';

            $consulta = "SELECT * FROM producto"; 
            $query = mysqli_query($conex, $consulta);

            if (!$query) {
                echo "Error en la consulta: " . mysqli_error($conex);
            } else {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<tr id="producto_' . $row['IdProducto'] . '">
                            <td>' . $row['IdProducto'] . '</td>
                            <td>' . $row['IdProveedor'] . '</td>
                            <td>' . $row['nomProd'] . '</td>
                            <td>' . $row['marcaProd'] . '</td>
                            <td>' . $row['existenciasProd'] . '</td>
                            <td>' . $row['precioPublico'] . '</td>
                        </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
