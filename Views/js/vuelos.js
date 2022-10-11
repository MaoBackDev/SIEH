// ********************************************** CARGAR DATOS DINÁMICOS TABLA VUELOS**********************************

$.ajax({
  url: "Ajax/vuelo.ajax.php",
  success: function (respuesta) {},
});

$("#tablaVuelo").DataTable({
  ajax: "Ajax/vuelo.ajax.php",
  type: "POST",
  responsive: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

// ********************************************** EDITAR VUELOS**********************************
$(document).on("click", ".btnEditVuelo", function () {
  var idVuelo = $(this).attr("idVuelo"); //Se captura el valor del id al dar click en el boton editar

  var datos = new FormData();
  datos.append("idVuelo", idVuelo);

  $.ajax({
    url: "Ajax/vuelo.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      $("#editOrden").val(respuesta["ordenVuelo"]);
      $("#editFecha").val(respuesta["fechaVuelo"]);
      $("#horaInicioActual").val(respuesta["hora_inicio"]);
      $("#horaFinActual").val(respuesta["hora_final"]);
      $("#cantidadActual").val(respuesta["cantidadHora"]);
      $("#editObservaciones").val(respuesta["observaciones"]);
    
      // Consultar la tabla aeronaves para traer la matricula
      var datosAeronave = new FormData();
      datosAeronave.append("idAeronave", respuesta["idAeronave"]);

      $.ajax({
        url: "Ajax/aeronave.ajax.php",
        method: "POST",
        data: datosAeronave,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          // console.log(respuesta);
          $("#editAeronave").val(respuesta["idAeronave"]);
          $("#editAeronave").html(respuesta["matricula"]);
        },
      });

      // Consultar la tabla misiones para traer el tipo de misión
      var datosMision = new FormData();
      datosMision.append("idMision", respuesta["idMision"]);

      $.ajax({
        url: "Ajax/misiones.ajax.php",
        method: "POST",
        data: datosMision,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          // console.log(respuesta);
          $("#editMision").val(respuesta["idMision"]);
          $("#editMision").html(respuesta["tipo_mision"]);
        },
      });

      // Consultar la tabla condiciones para traer la condicion de vuelo
      var datosCondicion = new FormData();
      datosCondicion.append("idCondicion", respuesta["idCondicion"]);

      $.ajax({
        url: "Ajax/condicion.ajax.php",
        method: "POST",
        data: datosCondicion,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          // console.log(respuesta);
          $("#editCondicion").val(respuesta["idCondicion"]);
          $("#editCondicion").html(respuesta["nombreCondicion"]);
        },
      });

       // Consultar la tabla cargos para traer el cargo de vuelo
       var datosCargo = new FormData();
       datosCargo.append("idCargo", respuesta["idCargo"]);
 
       $.ajax({
         url: "Ajax/cargo.ajax.php",
         method: "POST",
         data: datosCargo,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
           console.log(respuesta);
           $("#editCargo").val(respuesta["idCargo"]);
           $("#editCargo").html(respuesta["nombreCargo"]);
         },
       });

      // Consultar la tabla tripulantes para traer el nombre del tripulante
      var datosTripulante = new FormData();
      datosTripulante.append("idTripulante", respuesta["idTripulante"]);

      $.ajax({
        url: "Ajax/tripulante.ajax.php",
        method: "POST",
        data: datosTripulante,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          // console.log(respuesta);
          $("#editTripValue").val(respuesta["idTripulante"]);
          $("#editTrip").val(
            respuesta["apellidos"] + " " + respuesta["nombres"]
          );
        },
      });
    },
  });
});
