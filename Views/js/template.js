// ------------------DATATABLE---------------------------
$(".tableData").DataTable({
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

// ************************* GRÁFICOS DASHBOARD **************

$.ajax({
  url: "Ajax/home.ajax.php",
  method: "POST",
  data: {
    accion: 1,
  },
  dataType: "json",
  success: function (respuesta) {
    var fecha_vuelo = [];
    var total_horas = [];
    var total_horas_mes = 0;

    for (let i = 0; i < respuesta.length; i++) {
      fecha_vuelo.push(respuesta[i]["fechaVuelo"]);
      total_horas.push(respuesta[i]["sum(round(cantidadHora))"]);

      total_horas_mes =
        parseFloat(total_horas_mes) +
        parseFloat(respuesta[i]["sum(round(cantidadHora))"]);
    }

    //Se imprime el total de horas en el header del gráfico
    $("#card-title").html("Total Horas del mes:   " + total_horas_mes);

    const ctx = document.getElementById("chart").getContext("2d");
    const myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: fecha_vuelo,
        datasets: [
          {
            data: total_horas,
            fill: false,
            borderColor: "#343A40",
            tension: 0.1,
          },
        ],
      },
      options: {
        scales: {
          xAxes: [
            {
              gridLines: {
                display: false,
              },
            },
          ],
        },
        title: {
          display: true,
          text: "Horas de vuelo Mes Actual",
          fontsize: 30,
          padding: 30,
          fontColor: "#343A40",
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "#0564f5",
          titleFontSize: 17,
          xPadding: 10,
          yPadding: 10,
          bodyFontSize: 12,
          bodySpacing: 10,
        },
        elements: {
          line: {
            borderWidth: 6,
            fill: false,
          },
          point: {
            radius: 5,
            borderWidth: 1,
            backgroundColor: "#fff",
            hoverRadius: 7,
            hoverBorderRadius: 7,
          },
        },
      },
    });
  },
});

// ************************ GRAFICO VUELOS POR CONDICIÓN************

$.ajax({
  url: "Ajax/home.ajax.php",
  method: "POST",
  data: {
    accion: 4,
  },
  dataType: "json",
  success: function (respuesta) {
    colors = ["blue", "green", "orange", "gray"];
    colorsBg = ["blue", "rgba 5, 46, 5, 0.466", "orange", "gray"];

    const ctx = document.getElementById("chartCondicion").getContext("2d");
    const chartCondicion = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Diurno", "Nocturno", "LVN", "IFR"],
        datasets: [
          {
            data: [
              respuesta.filter(
                (eachVuelo) => eachVuelo.nombreCondicion === "Diurno"
              ).length,
              respuesta.filter(
                (eachVuelo) => eachVuelo.nombreCondicion === "Nocturno"
              ).length,
              respuesta.filter(
                (eachVuelo) =>
                  eachVuelo.nombreCondicion === "Lentes de visión nocturna"
              ).length,
              respuesta.filter(
                (eachVuelo) =>
                  eachVuelo.nombreCondicion === "Instrumental Flight Rules"
              ).length,
            ],
            borderWidth: 1,
            borderColor: colors,
            backgroundColor: colors,
          },
        ],
      },
      options: {
        scales: {
          gridLines: {
            color: "#000",
            display: false,
          },
          ticks: {
            display: false,
          },
        },
        legend: {
          position: "right",
          labels: {
            fontColor: "#000",
          },
        },
      },
    });
  },
});

// GRÁFICO TOP 5 TRIPULANTES

$.ajax({
  url: "Ajax/home.ajax.php",
  method: "POST",
  data: {
    accion: 2,
  },
  dataType: "json",
  success: function (respuesta) {
    console.log(respuesta);
    var nombres = [];
    var horas = [];

    for (let i = 0; i < respuesta.length; i++) {
      nombres.push(respuesta[i]["tripulantes"]);
      horas.push(respuesta[i]["horas"]);
    }

    const ctx = document.getElementById("trip").getContext("2d");
    const trip = new Chart(ctx, {
      type: "bar",
      data: {
        labels: nombres,
        datasets: [
          {
            
            data: horas,
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          gridLines: {
            color: "#000",
            display: false,
          },
          ticks: {
            display: false,
          },
          y: {
            beginAtZero: true,
          },
        },
        legend:{
          display: false
        }
      },
    });
  },
});

// AERONAVES DISPONIBLES
$.ajax({
  url: "Ajax/home.ajax.php",
  method: "POST",
  data: {
    accion: 3,
  },
  dataType: "json",
  success: function (respuesta) {
    for (let i = 0; i < respuesta.length; i++) {
      filas =
        "<tr>" +
        "<td>" +
        respuesta[i]["idAeronave"] +
        "</td>" +
        "<td>" +
        respuesta[i]["matricula"] +
        "</td>" +
        "<td>" +
        respuesta[i]["tipoAeronave"] +
        "</td>" +
        "</tr>";

      $("#tbl-aeronaves-disponibles").append(filas);
    }
  },
});
