$(document).ready(function() {
    var camposEmpleados = [
        { name: "nomEmpleado", placeholder: "Nombre" },
        { name: "apellidoPE", placeholder: "Apellido Paterno" },
        { name: "apellidoME", placeholder: "Apellido Materno" },
        { name: "telefonoE", placeholder: "Teléfono" },
        { name: "puestoE", placeholder: "Puesto" },
        { name: "rangoE", placeholder: "Rango" },
        { name: "salarioE", placeholder: "Salario" }
    ];
    
    var camposFacturas = [
        { name: "IdPedido", placeholder: "ID Pedido" },
        { name: "fechaFactura", placeholder: "Fecha" },
        { name: "totalFactura", placeholder: "Total" }
    ];
    
    var camposPedidos = [
        { name: "IdProducto", placeholder: "ID Producto" },
        { name: "IdProveedor", placeholder: "ID Proveedor" },
        { name: "fechaPedido", placeholder: "Fecha" },
        { name: "cantidadPedido", placeholder: "Cantidad" },
        { name: "totalPedido", placeholder: "Total" }
    ];
    
    var camposProductos = [
        { name: "nomProducto", placeholder: "Nombre" },
        { name: "precioVentaP", placeholder: "Precio de Venta" },
        { name: "existenciaP", placeholder: "Existencia" },
        { name: "categoriaP", placeholder: "Categoría" },
        { name: "precioCompraP", placeholder: "Precio de Compra" },
        { name: "codigoP", placeholder: "Código" }
    ];
    
    var camposProveedores = [
        { name: "nomProveedor", placeholder: "Nombre" },
        { name: "apellidoPProv", placeholder: "Apellido P" },
        { name: "apellidoMProv", placeholder: "Apellido M" },
        { name: "direccionProv", placeholder: "Ubicación" },
        { name: "telefonoProv", placeholder: "Teléfono" }
    ];
    
    var camposVentas = [
        { name: "IdEmpleado", placeholder: "ID Empleado" },
        { name: "IdProducto", placeholder: "ID Producto" },
        { name: "fechaVenta", placeholder: "Fecha" },
        { name: "cantidadVenta", placeholder: "Cantidad" },
        { name: "totalVenta", placeholder: "Total" }
    ];

    function generarFormulario(campos) {
        $('#formulario_dinamico').empty();
        campos.forEach(function(campo) {
            var divCampo = $('<div class="campo"></div>'); // Crear un div para cada campo
            var label = $('<label for="'+campo.name+'">'+campo.placeholder+':</label>'); // Crear el label
            var input = $('<input type="text" name="'+campo.name+'" placeholder="'+campo.placeholder+'">'); // Crear el input
            divCampo.append(label);
            divCampo.append(input); 
            $('#formulario_dinamico').append(divCampo); // Agregar el div al formulario
        });
        $('#formulario_dinamico').append('<button type="button" id="btn_GuardarFormulario">Guardar</button>'); // Cambiado a type="button"
        $('#formulario_dinamico').show();
    }
    
    $('#btn_Agregar').click(function() {
        var tituloActual = $('#tituloTabla').text();
        switch (tituloActual) {
            case 'Empleados':
                generarFormulario(camposEmpleados);
                break;
            case 'Facturas':
                generarFormulario(camposFacturas);
                break;
            case 'Pedidos':
                generarFormulario(camposPedidos);
                break;
            case 'Productos':
                generarFormulario(camposProductos);
                break;
            case 'Proveedor':
                generarFormulario(camposProveedores);
                break;
            case 'Venta':
                generarFormulario(camposVentas);
                break;
        }
    });

    $(document).on('click', '#btn_GuardarFormulario', function() {
        var formularioValido = true;
        $('.campo input').each(function() {
            if ($(this).val().trim() === '') {
                formularioValido = false;
                return false; // Salir del bucle each si se encuentra un campo vacío
            }
        });

        if (!formularioValido) {
            alert('Por favor, llene todos los campos antes de guardar.');
            return;
        }

        var tituloActual = $('#tituloTabla').text();
        var url = '';
        switch (tituloActual) {
            case 'Empleados':
                url = '../php/agregar/agregarEmpleado.php';
                break;
            case 'Facturas':
                url = '../php/agregar/agregarFactura.php';
                break;
            case 'Pedidos':
                url = '../php/agregar/agregarPedido.php';
                break;
            case 'Productos':
                url = '../php/agregar/agregarProducto.php';
                break;
            case 'Proveedor':
                url = '../php/agregar/agregarProveedor.php';
                break;
            case 'Venta':
                url = '../php/agregar/agregarVenta.php';
                break;
        }

        var datos = $('#formulario_dinamico').serialize();

        $.post(url, datos, function(response) {
            if (response === 'success') {
                alert('Registro agregado correctamente');
                $('#formulario_dinamico').hide();
                // Puedes agregar una llamada para recargar la tabla aquí
            } else {
                alert('Error al agregar el registro en la tabla : ' + response);
            }
        }).fail(function(xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('Error al enviar la solicitud: ' + errorMessage);
            console.error(xhr.responseText); // Mostrar más detalles en la consola
        });
    });

});
