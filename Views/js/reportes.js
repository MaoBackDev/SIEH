$(document).ready(function () {
  $("#tablaReporte").DataTable({
    responsive: true,
    deferRender: true,
    retrieve: true,
    processing: true,
    searching: true,
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

    dom: "Bfrtip",

    buttons: [
      {
        extend: "excelHtml5",
        title:"Reporte horas de vuelo SIEH",
        text: "<i class='fas fa-file-excel'></i>",
        titleAttr:"Exportar a excel",
        className: "btn btn-success",
        
      },
      {
        extend: "pdfHtml5",
        title:"Reporte horas de vuelo SIEH",
        orientation:"landscape",
        text: "<i class='fas fa-file-pdf'></i>",
        titleAttr:"Exportar a pdf",
        className: "btn btn-danger",
        
      },
      {
        extend: "print",
        text: "<i class='fas fa-print'></i>",
        titleAttr:"Imprimir",
        className: "btn btn-info",
        
      }
    ]
  });
});
