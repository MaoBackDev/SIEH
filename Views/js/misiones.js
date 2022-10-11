// *********************************EDITAR MISIONES *************************************

$(document).on('click', '.btnEditMision', function(){

    var idMision = $(this).attr("idMision"); //Capturar el valor del atributo asignado al input en html
    console.log(idMision)
    var datos = new FormData(); //Acceder a la base de datos desde javaScript interactuando con Ajax
    datos.append("idMision", idMision);

    $.ajax({
        url: "Ajax/misiones.ajax.php",
        method: "POST",
        data : datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            console.log(respuesta)
            $('#editMision').val(respuesta['tipo_mision']);
            $('#editCodMision').val(respuesta['codigo']);
            $('#editIdMision').val(respuesta['idMision']);
        }
    })
}) 

