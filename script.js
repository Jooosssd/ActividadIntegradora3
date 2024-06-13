function eliminarProducto(idProducto) {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        console.log("Enviando solicitud para eliminar el producto con ID: " + idProducto);
        $.ajax({
            type: "POST",
            url: "/farmaciaDLAOS/php/eliminar_producto.php", // Ruta de tu archivo PHP para eliminar el producto
            data: { id: idProducto },
            success: function(response) {
                console.log("Respuesta del servidor: " + response);
                if (response.trim() === "success") {
                    $("#producto_" + idProducto).remove(); // Eliminar la fila de la tabla
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
