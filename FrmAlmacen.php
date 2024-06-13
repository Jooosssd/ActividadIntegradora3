<?php
require 'conexionAlmacen.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/farmaciaDLAOS/css/style_Almacen.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/agregar.css?v=<?php echo time(); ?>">
    <title>Almacen</title>
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
                <h1 id="titulo">Almacen</h1>
            </div>
            <div class="contenedor_user-der">
                <h3>Juaking</h3>
                <h5>Encargado de Almacen</h5>
                <img src="/farmaciaDLAOS/assets/icons/avatar.png" alt="">
            </div>
        </div>
    </header>
    
    <div class="contenedor_botones">
        <button id="btnProd">Productos</button>
        <button id="btnProv">Proveedores</button>
    </div>

    <div class="contenedorBD">
        <div class="contenedor_contenido">
            <div class="tituloTabla">
                <!-- <img src="/farmaciaDLAOS/assets/icons/garantia.png" id="iconProducto"> -->
                <span class="iconoTabla"><i class="fa-solid fa-warehouse"></i></span>
                <h1 id="tituloTabla">Productos</h1>
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
                        <th scope="col">Empleado</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="datos">
                    <?php
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
                                    <td class="editable" data-campo="marcaProd">' . $row['marcaProd'] . '</td>
                                    <td class="editable" data-campo="existenciasProd">' . $row['existenciasProd'] . '</td>
                                    <td class="editable" data-campo="precioPublico">' . $row['precioPublico'] . '</td>
                                    <td class="acciones">
                                        <img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono editar">
                                        <img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarProducto(' . $row['IdProducto'] . ')">
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
    <script>
    $(document).ready(function(){

        $("#btnProd").click(function(){
            $("#tituloTabla").text("Productos");
            $("#contenedor_tabla").load("productos.php");
            $("#btn_Agregar").show();
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className = 'fa-solid fa-warehouse';
        });

        $("#btnProv").click(function(){
            $("#tituloTabla").text("Proveedores");
            $("#contenedor_tabla").load("proveedores.php", { icono: "cliente.png" }); 
            // $("#iconProducto").attr("src", "/farmaciaDLAOS/assets/icons/cliente.png");
            $("#btn_Agregar").hide();
            $('#formulario_dinamico').hide();
            const icono = document.querySelector('.iconoTabla i');
            icono.className = 'fa-solid fa-boxes-packing';
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

        
        //AQUI ESTA LA PARTE PARA EDITAR WE NAMAS COPEA Y METELE TUS VALORES A CADA FORMULARIO
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
            var idProducto = fila.attr('id').split('_')[1];
            var datos = { id: idProducto };

            fila.find('.edit-input').each(function() {
                var campo = $(this).data('campo');
                var valor = $(this).val();
                datos[campo] = valor;
            });

            $.post('editarProd.php', datos, function(response) {
                if (response === 'success') {
                    fila.find('.edit-input').each(function() {
                        var valor = $(this).val();
                        $(this).parent().text(valor);
                    });
                    fila.find('.acciones').html('<img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono editar"><img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarProducto(' + idProducto + ')">');
                } else {
                    alert('Error al guardar los cambios.');
                }
            });
        });

        $("#btn_Salir").click(function(){
            window.location.href = "login.php";
        });

    });

    function eliminarProducto(idProducto) {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            console.log("Enviando solicitud para eliminar el producto con ID: " + idProducto);
            $.ajax({
                type: "POST",
                url: "eliminar_producto.php", 
                data: { id: idProducto },
                success: function(response) {
                    console.log("Respuesta del servidor: " + response);
                    if (response === "success") {
                        $("#producto_" + idProducto).remove(); 
                    } else {
                        alert("Error al intentar eliminar el producto.");
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
        
    </script>
</body>
</html>
