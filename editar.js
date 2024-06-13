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
    var idRegistro = fila.attr('id').split('_')[1];
    var tituloActual = $('#tituloTabla').text();
    var datos = { id: idRegistro };

    fila.find('.edit-input').each(function() {
        var campo = $(this).data('campo');
        var valor = $(this).val();
        datos[campo] = valor;
    });

    var url = ''; // Variable para almacenar la URL del archivo PHP de edición

    switch (tituloActual) {
        case 'Empleados':
            url = '../php/editarEmpleados.php';
            break;
        case 'Facturas':
            url = '../php/editarFacturas.php';
            break;
        case 'Pedidos':
            url = '../php/editarPedidos.php';
            break;
        case 'Productos':
            url = '../php/editarProd.php';
            break;
        case 'Proveedor':
            url = '../php/editarProveedores.php';
            break;
        case 'Venta':
            url = '../php/editarVentas.php';
            break;
        default:
            alert('No se encontró la URL adecuada para la edición.');
            return;
    }

    $.post(url, datos, function(response) {
        if (response === 'success') {
            fila.find('.edit-input').each(function() {
                var valor = $(this).val();
                $(this).parent().text(valor);
            });
            fila.find('.acciones').html('<img src="/farmaciaDLAOS/assets/icons/lapiz.png" alt="Editar" class="icono editar"><img src="/farmaciaDLAOS/assets/icons/basura.png" alt="Eliminar" class="icono" onclick="eliminarRegistro(' + idRegistro + ')">');
            alert('Cambios guardados correctamente.');
        } else {
            alert('Error al guardar los cambios.');
        }
    }).fail(function(xhr, status, error) {
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        alert('Error en la solicitud: ' + errorMessage);
        console.error(xhr.responseText);
    });
});
