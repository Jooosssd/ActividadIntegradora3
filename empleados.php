<?php
require 'conexionAdmin.php';

$consulta = "SELECT * FROM empleado";
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
                        <th scope="col">Telefono</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Rango</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<tr id="empleado_' . $row['IdEmpleado'] . '">
                <td>' . $row['IdEmpleado'] . '</td>
                <td class="editable" data-campo="nomEmpleado">' . $row['nomEmpleado'] . '</td>
                <td class="editable" data-campo="apellidoPE">' . $row['apellidoPE'] . '</td>
                <td class="editable" data-campo="apellidoME">' . $row['apellidoME'] . '</td>
                <td class="editable" data-campo="telefonoE">' . $row['telefonoE'] . '</td>
                <td class="editable" data-campo="puestoE">' . $row['puestoE'] . '</td>
                <td class="editable" data-campo="rangoE">' . $row['rangoE'] . '</td>
                <td class="editable" data-campo="salarioE">' . $row['salarioE'] . '</td>
                <td class="acciones">
                    <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono">
                    <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarEmpleado(' . $row['IdEmpleado'] . ')">
                </td>
            </tr>';
    }
    echo '    </tbody>
            </table>
          </div>';
}

?>