// ****************************************************** SUBIR UNA IMAGEN ************************************************

$(".foto").change(function () {
  var img = this.files[0]; //se accede a los atributos de la imagen

  if (img["type"] != "image/jpeg" && img["type"] != "image/png") {
    $(".foto").val(""); // se limpia el input

    swal.fire({
      title: "Error!",
      text: "La imagen debe estar en formato jpg o png",
      icon: "error",
      confirmButtonText: "Ok",
    });
  } else if (img["size"] > 2000000) {
    $(".foto").val("");

    swal.fire({
      title: "Error!",
      text: "La imagen no debe pesar más de 2MB",
      icon: "error",
      confirmButtonText: "Ok",
    });
  } else {
    var datosImg = new FileReader(); //lectura de archivo
    datosImg.readAsDataURL(img); //

    // Cuando la imagen se carga se extrae la ruta de la imagen para mostrarla enel documento html
    $(datosImg).on("load", function (e) {
      var rutaImg = e.target.result;
      $(".visualizar").attr("src", rutaImg);
    });
  }
});

// ****************************************************** EDITAR TRIPULANTE ************************************************

// Se usa esta acción para seleccionar los botones cuando se encuentran ocultos - Tablas responsivas
$(document).on("click", ".btnEditarTrip", function () {
  var idTripulante = $(this).attr("idTripulante"); //Se captura el valor del id al dar click en el boton editar

  // Se instancia un objeto de la clase FormData de javascript para conectar la base de datos desde javascript y se agrega una variable post que traerá el valor de la captura.

  var datos = new FormData();
  datos.append("idTripulante", idTripulante);

  // Se usa la acción de ajax para retornar los datos en formato json

  $.ajax({
    url: "Ajax/tripulante.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#documento").val(respuesta["documento"]);
      $("#codigo_militar").val(respuesta["codigo_militar"]);
      $("#apellidos").val(respuesta["apellidos"]);
      $("#nombres").val(respuesta["nombres"]);
      $("#correo").val(respuesta["correo"]);
      $("#claveActual").val(respuesta["clave"]);
      $("#fecha_nacimiento").val(respuesta["fecha_nacimiento"]);
      $("#fecha_promocion").val(respuesta["fecha_promocion"]);
      $("#certificado_medico").val(respuesta["certificado_medico"]);
      $("#editRol").html(respuesta["rol"]);
      $("#editRol").val(respuesta["rol"]);
      $("#estado").val(respuesta["estado"]);

      // Consultar la tabla de categorías para traer el nombre de la categoría del tripulante
      var datosCategoria = new FormData();
      datosCategoria.append("categoriaId", respuesta["id_categoria"]);

      $.ajax({
        url: "Ajax/categoria.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);
          $("#editCategoria").val(respuesta["idCategoria"]);
          $("#editCategoria").html(respuesta["nombreCategoria"]);
        },
      });

      // Consultar la tabla de grados para traer el nombre del grado del tripulante
      var datosGrado = new FormData();
      datosGrado.append("idGrado", respuesta["id_grado"]);

      $.ajax({
        url: "Ajax/grado.ajax.php",
        method: "POST",
        data: datosGrado,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);
          $("#editGrado").val(respuesta["idGrado"]);
          $("#editGrado").html(respuesta["nombreGrado"]);
        },
      });

      $("#fotoActual").val(respuesta["foto"]);
      if (respuesta["foto"] != "") {
        $(".visualizar").attr("src", respuesta["foto"]);
      }
      // $("#idEditarTripulante").val(respuesta['idTripulante']);
      console.log(respuesta);
    },
  });
});

/* ************************************** VERIFICAR SI EL USUARIO YA ESTÁ REGISTRADO ****************************************/
$("#nuevoTrip").change(function () {
  $(".alert").remove();
  var tripulante = $(this).val();
  var datos = new FormData();
  datos.append("validarTripulante", tripulante);

  $.ajax({
    url: "Ajax/tripulante.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#nuevoTrip")
          .parent()
          .after(
            '<div class="alert alert-warning">El documento que intenta ingresar ya existe en el sistema.</div>'
          );
        $("#nuevoTrip").val();
      }
    },
  });
});

// ******************************* ACTIVAR Y DESACTIVAR TRIPULANTES DESDE LA TABLA ****************************************

$(document).on("click", ".btn-active-trip", function () {
  // SE CAPTURAN LOS VALORES DE LOS ATRIBUTOS ASIGNADOS AL BOTON ACTIVAR DE HTML
  var act_tripulante = $(this).attr("act-tripulante");
  var estadoTripulante = $(this).attr("estadoTripulante");

  var datosTrip = new FormData();
  datosTrip.append("activar_id_trip", act_tripulante);
  datosTrip.append("activarTripulante", estadoTripulante);

  $.ajax({
    url: "Ajax/tripulante.ajax.php",
    method: "POST",
    data: datosTrip,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {},
  });

  // REMOVER LA CLASE ACTUAL Y AGREGAR LA NUEVA

  if (estadoTripulante == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoTripulante", 1);
  } else {
    $(this).removeClass("btn-danger");
    $(this).addClass("btn-success");
    $(this).html("Activado");
    $(this).attr("estadoTripulante", 0);
  }
});

// ********************************************** CARGAR DATOS DINÁMICOS **********************************

$.ajax({
  url: "Ajax/datatable-tripulante.ajax.php",
  success: function (respuesta) {
    // console.log(respuesta);
  }
});

$("#tableTripulantes").DataTable({
  ajax: "Ajax/datatable-tripulante.ajax.php",
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
      sSortAscending:
        ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});


