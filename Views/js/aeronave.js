// *********************************EDITAR AERONAVES *************************************

$(document).on('click', '.btnEditAeronave', function(){

    var idAeronave = $(this).attr("idAeronave"); //Capturar el valor del atributo asignado al input en html

    var datos = new FormData(); //Acceder a la base de datos desde javaScript interactuando con Ajax
    datos.append("idAeronave", idAeronave);

    $.ajax({
        url: "Ajax/aeronave.ajax.php",
        method: "POST",
        data : datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
			
            $('#editMatricula').val(respuesta['matricula']);
            $('#editTipoAeronave').html(respuesta['tipoAeronave']);
            $('#editTipoAeronave').val(respuesta['tipoAeronave']);
            $('#editEstadoAeronave').html(respuesta['estado']);
            $('#editEstadoAeronave').val(respuesta['estado']);
            $('#editIdAeronave').val(respuesta['idAeronave']);
        }
    })
}) 

