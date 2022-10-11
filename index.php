<?php

    // IMPORTAR CONTROLADORES
    require_once "Controllers/template.controller.php";
    require_once "Controllers/tripulantes.controller.php";
    require_once "Controllers/grado.controller.php";
    require_once "Controllers/categoria.controller.php";
    require_once "Controllers/condicion.controller.php";
    require_once "Controllers/cargo.controller.php";
    require_once "Controllers/aeronave.controller.php";
    require_once "Controllers/misiones.controller.php";
    require_once "Controllers/vuelos.controller.php";
    require_once "Controllers/reporte.controller.php";

    // IMPORTAR MODELOS
    require_once "Models/tripulante.modelo.php";
    require_once "Models/grado.modelo.php";
    require_once "Models/categoria.modelo.php";
    require_once "Models/condicion.modelo.php";
    require_once "Models/cargo.modelo.php";
    require_once "Models/aeronave.modelo.php";
    require_once "Models/misiones.modelo.php";
    require_once "Models/vuelos.modelo.php";
    require_once "Models/reporte.modelo.php";

    $template = new ControllerTemplate();
    $template->ctrTemplate();
