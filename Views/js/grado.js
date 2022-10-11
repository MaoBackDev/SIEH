// *********************************EDITAR GRADO*************************************

$(document).on("click", ".btnEditGrado", function () {
  var idGrado = $(this).attr("idGrado"); //Capturar el valor del atributo asignado al input en html

  var datos = new FormData();
  datos.append("idGrado", idGrado);

  $.ajax({
    url: "Ajax/grado.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#grado").val(respuesta["nombreGrado"]);
      $("#abrGrado").val(respuesta["abreGrado"]);
      $("#idEditGrado").val(respuesta["idGrado"]);
    }
  });
});
