$(function () {
  // VALIDACIÓN FORMULARIO LOGIN

  $("#form-login").validate({
    rules: {
      ingUser: {
        required: true,
        number: true,
      },
      ingPass: {
        required: true,
        minlength: 4,
      },
    },
    messages: {
      ingUser: {
        required: "El campo documento no puede estar vacío ",
        number: "Por favor, ingresa un número de documento válido",
      },
      ingPass: {
        required: "El campo contraseña no puede estar vacío",
        minlength: "La contraseña debe tener al menos 4 caractéres",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR CARGOS DE VUELO
  $("#form-cargo").validate({
    rules: {
      newCargo: {
        required: true,
      },
      newCodCargo: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR CARGOS DE VUELO
  $("#form-categoria").validate({
    rules: {
      categoria: {
        required: true,
      },
      codigo: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR MISIONES
  $("#form-misiones").validate({
    rules: {
      newMision: {
        required: true,
      },
      newCodMision: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR GRADOS
  $("#form-grado").validate({
    rules: {
      newGrado: {
        required: true,
      },
      newAbreGrado: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  
  // VALIDACIÓN FORMULARIO CREAR CONDICIONES
  $("#form-condiciones").validate({
    rules: {
      newCondicion: {
        required: true,
      },
      newCodCondicion: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR AERONAVES
  $("#form-aeronaves").validate({
    rules: {
      newMatricula: {
        required: true,
      },
      tipoAeronave: {
        required: true,
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

  // VALIDACIÓN FORMULARIO CREAR TRIPULANTES
  $("#form-tripulantes").validate({
    rules: {
      documento: {
        required: true,
        number: true,
      },
      codigo_militar: {
        required: true,
      },
      apellidos:{
        required: true,
      },
      nombres:{
        required: true,
      },
      correo:{
        required: true,
        email: true
      },
      clave:{
        required: true,
      },
      fecha_nacimiento:{
        required: true,
      },
      fecha_promocion:{
        required: true,
      },
      certificado_medico:{
        required: true,
      },
      rol:{
        required: true,
      },
      categoria:{
        required: true,
      },
      grado:{
        required: true,
      },
    },
    messages: {
      documento: {
        required: "El campo documento no puede estar vacío ",
        number: "Por favor, ingresa un número de documento válido",
      },
      correo:{
        email: "Por favor, ingresa una dirección de correo válida."
      }
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });

    // VALIDACIÓN FORMULARIO CREAR VUELOS
    $("#form-vuelos").validate({
      rules: {
        newOrden: {
          required: true
        },
        newAeronave: {
          required: true,
        },
        newFecha:{
          required: true,
        },
        newMision:{
          required: true,
        },
        newCondicion:{
          required: true,
        },
        newFechaInicio:{
          required: true,
        },
        newFechaFin:{
          required: true,
        },
        newCargo:{
          required: true,
        }
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },
    });
});
