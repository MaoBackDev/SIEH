// *********************************EDITAR CARGO *************************************

$(document).on('click', '.btnEditCargo', function(){

    var idCargo = $(this).attr("idCargo"); //Capturar el valor del atributo asignado al input en html

    var datos = new FormData(); //Acceder a la base de datos desde javaScript interactuando con Ajax
    datos.append("idCargo", idCargo);

    $.ajax({
        url: "Ajax/cargo.ajax.php",
        method: "POST",
        data : datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
			console.log(respuesta);
            $('#editCargo').val(respuesta['nombreCargo']);
            $('#editCodCargo').val(respuesta['abreCargo_vuelo']);
            $('#editIdCargo').val(respuesta['idCargo']);
        }
    })
}) 


// $(document).on("click", ".btnEditarTrip", function ()