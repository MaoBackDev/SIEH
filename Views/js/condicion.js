// *********************************EDITAR CONDICION*************************************

$(document).on('click','.btnEditCondicion', function(){

    var idCondicion = $(this).attr("idCondicion"); //Capturar el valor del atributo asignado al input en html

    var datos = new FormData(); //Acceder a la base de datos desde javaScript interactuando con Ajax
    datos.append("idCondicion", idCondicion);

    $.ajax({
        url: "Ajax/condicion.ajax.php",
        method: "POST",
        data : datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
			console.log(respuesta);
            $('#editCondicion').val(respuesta['nombreCondicion']);
            $('#editCodCondicion').val(respuesta['abreCondicion_vuelo']);
            $('#editIdCondicion').val(respuesta['idCondicion']);
        }
    })
}) 


