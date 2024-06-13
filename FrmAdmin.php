<?php
require 'conexionAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="/farmaciaDLAOS/css/style_Almacen.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/menu.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/agregar.css?v=<?php echo time(); ?>">
    <title>Administracion</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/fontawesome.js"></script>
    <script src="../js/prefixfree.min.js"></script>
</head>
<body>
    <header>
        <div class="contenedor_header">
            <div class="contenedor_logo-izq">
                <img id="faramaciaIcon" src="/farmaciaDLAOS/assets/icons/farmacia.png" alt="">
                <h2 id="farmacia">Farmacia</h2>
                <h2 id="dlaos">D'LAOS</h2>
            </div>
            <div class="contenedor_titulo">
                <h1 id="titulo">Administracion</h1>
            </div>
            <div class="contenedor_user-der">
                <h3>Cristian Tello</h3>
                <h5>Usuario Administrador</h5>
                <img src="/farmaciaDLAOS/assets/icons/avatar.png" alt="">
            </div>
        </div>
    </header>

    <section class="container">
        <div class="navegacion active">
            <a id="btnEmpleados">
                <span class="icono"><i class="fa-solid fa-user"></i></span>
                <span class="title">Empleados</span>
            </a>
            <a id="btnFacturas">
                <span class="icono"><i class="fa-solid fa-wallet"></i></span>
                <span class="title">Facturas</span>
            </a>
            <a id="btnPedidos">
                <span class="icono"><i class="fa-brands fa-jedi-order"></i></span>
                <span class="title">Pedidos</span>
            </a>
            <a id="btnProd">
                <span class="icono"><i class="fa-solid fa-warehouse"></i></span>
                <span class="title">Productos</span>
            </a>
            <a id="btnProv">
                <span class="icono"><i class="fa-solid fa-boxes-packing"></i></span>
                <span class="title">Proveedores</span>
            </a>
            <a id="btnVenta">
                <span class="icono"><i class="fa-solid fa-money-bill"></i></span>
                <span class="title">Ventas</span>
            </a>
        </div>
        <div class="toggle">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </section>

    <div class="contenedorBD">
        <div class="contenedor_contenido">
            <div class="tituloTabla">
                <span class="iconoTabla"><i class="fa-solid fa-user"></i></span>
                <h1 id="tituloTabla">Empleados</h1>
            </div>
            <div class="Agregar">
                <button class="btnAgregar" id="btn_Agregar"><i class="fa-solid fa-plus"></i> Agregar</button>
            </div>
            <div class="busqueda">
                <div class="barra">
                    <input type="text" placeholder="Buscar" id="buscar">
                    <img src="/farmaciaDLAOS/assets/icons/lupa.png" alt="">
                </div>
            </div>
        </div>
        <div class="contenedor_tabla" id="contenedor_tabla">
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
                <tbody id="datos">
                    <?php
                    $consulta = "SELECT * FROM empleado"; 
                    $query = mysqli_query($conex, $consulta);

                    if (!$query) {
                        echo "Error en la consulta: " . mysqli_error($conex);
                    } else {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<tr id="empleado_' . $row['IdEmpleado'] . '">
                                    <td>' . $row['IdEmpleado'] . '</td>
                                    <td>' . $row['nomEmpleado'] . '</td>
                                    <td>' . $row['apellidoPE'] . '</td>
                                    <td>' . $row['apellidoME'] . '</td>
                                    <td class="editable" data-campo="telefonoE">' . $row['telefonoE'] . '</td>
                                    <td class="editable" data-campo="puestoE">' . $row['puestoE'] . '</td>
                                    <td class="editable" data-campo="rangoE">' . $row['rangoE'] . '</td>
                                    <td class="editable" data-campo="salarioE">' . $row['salarioE'] . '</td>
                                    <td class="acciones">
                                        <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono editar">
                                        <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono eliminar" data-id="' . $row['IdEmpleado'] . '" data-tabla="empleado" data-campo-id="IdEmpleado">
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="contenedor_formulario">
            <form id="formulario_dinamico" style="display: none;">
                <button type="submit" id="btn_GuardarFormulario">Guardar</button>
            </form>
        </div>
    </div>

    <div class="contenedor_salir">
        <button id="btn_Salir">Salir</button>
    </div>

    <script src="../js/agregar.js?v=<?php echo time(); ?>"></script>
    <script src="../js/editar.js?v=<?php echo time(); ?>"></script>

    <script>
    $(document).ready(function() {
        $("#btnEmpleados").click(function() {
            $("#tituloTabla").text("Empleados");
            $("#contenedor_tabla").load("empleados.php");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');   
            icono.className = 'fa-solid fa-user';
        });

        $("#btnFacturas").click(function() {
            $("#tituloTabla").text("Facturas");
            $("#contenedor_tabla").load("facturas.php");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className ='fa-solid fa-wallet';
        });

        $("#btnPedidos").click(function() {
            $("#tituloTabla").text("Pedidos");
            $("#contenedor_tabla").load("pedidos.php");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className = 'fa-brands fa-jedi-order';
        });

        $("#btnProd").click(function() {
            $("#tituloTabla").text("Productos");
            $("#contenedor_tabla").load("productosAdmin.php");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className = 'fa-solid fa-warehouse';
        });

        $("#btnProv").click(function() {
            $("#tituloTabla").text("Proveedor");
            $("#contenedor_tabla").load("proveedoresAdmin.php");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className = 'fa-solid fa-boxes-packing';
        });

        $("#btnVenta").click(function() {
            $("#tituloTabla").text("Venta");
            $("#contenedor_tabla").load("ventasAdmin.php", { icono: "cliente.png" }); 
            $("#iconProducto").attr("src", "/farmaciaDLAOS/assets/icons/cliente.png");
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');            
            icono.className = 'fa-solid fa-money-bill';
        });

        function filtrarTabla() {
            var textoBusqueda = $('#buscar').val().toLowerCase(); 
            $('#datos tbody tr').each(function() { 
                var textoFila = $(this).text().toLowerCase(); 
                $(this).toggle(textoFila.indexOf(textoBusqueda) > -1);
            });
        }

        $('#buscar').on('input', function() {
            filtrarTabla(); 
        });

        //editar

        $(document).on('click', '.icono.editar', function() {
        var fila = $(this).closest('tr');
        fila.find('.editable').each(function() {
            var valor = $(this).text();
            var campo = $(this).data('campo');
            $(this).html('<input type="text" class="edit-input" data-campo="'+campo+'" value="'+valor+'">');
        });
        fila.find('.acciones').html('<button class="guardar">Guardar</button>');
    });

    $(document).on('click', '.guardar', function() {
        var fila = $(this).closest('tr');
        var idEmpleado = fila.attr('id').split('_')[1];
        var datos = { id: idEmpleado };

        fila.find('.edit-input').each(function() {
            var campo = $(this).data('campo');
            var valor = $(this).val();
            datos[campo] = valor;
        });

        $.post('editarEmpleados.php', datos, function(response) {
            if (response === 'success') {
                fila.find('.edit-input').each(function() {
                    var valor = $(this).val();
                    $(this).parent().text(valor);
                });
                fila.find('.acciones').html('<img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono editar"><img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarEmpleado(' + idEmpleado + ')">');
            } else {
                alert('Error al guardar los cambios.');
            }
        });
    });

    $("#btn_Salir").click(function(){
        window.location.href = "login.php";
    });
        
    
    


        const navegacion = document.querySelector('.navegacion');
        document.querySelector('.toggle').onclick = function(){
            this.classList.toggle('active')
            navegacion.classList.toggle('active')
        }
    });

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    </script>

<!-- Agrega jQuery si aún no está incluido -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Script jQuery para manejar la eliminación de facturas -->


<script>
function eliminarFactura(IdFactura) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            console.log("Enviando solicitud para eliminar el producto con ID: " + IdFactura);
            $.ajax({
                type: "POST",
                url: "eliminar_factura.php", 
                data: { id: IdFactura },
                success: function(response) {
                    console.log("Respuesta del servidor: " + response);
                    if (response === "success") {
                        $("#producto_" + IdFactura).remove(); 
                    } else {
                        alert("Error al intentar eliminar la factura.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX: " + xhr.responseText);
                }
            });
        }
    }

</script>

<script>
    function eliminarEmpleado(IdEmpleado) {
    if (confirm("¿Estás seguro de que deseas eliminar este empleado?")) {
        console.log("Enviando solicitud para eliminar el empleado con ID: " + IdEmpleado);
        $.ajax({
            type: "POST",
            url: "eliminar_empleado.php",
            data: { id: IdEmpleado },
            success: function(response) {
                console.log("Respuesta del servidor: " + response);
                if (response === "success") {
                    $("#empleado_" + IdEmpleado).remove();
                } else {
                    alert("Error al intentar eliminar el empleado: " + response);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: " + xhr.responseText);
            }
        });
    }
}
</script>



</body>
</html>
