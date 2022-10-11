// *********************************EDITAR CATEGORÍA*************************************

$(document).on('click', '.btnEditCategoria', function(){

    var categoriaId = $(this).attr("categoriaId"); //Capturar el valor del atributo asignado al input en html

    var datos = new FormData();
    datos.append("categoriaId", categoriaId);

    $.ajax({
        url: "Ajax/categoria.ajax.php",
        method: "POST",
        data : datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $('#editNameCategoria').val(respuesta['nombreCategoria']);
            $('#editCodigoCategoria').val(respuesta['abrCategoria']);
            $('#idEditCategoria').val(respuesta['idCategoria']);
        }
    })
}) 
