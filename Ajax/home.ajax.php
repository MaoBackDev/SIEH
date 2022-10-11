<?php

require_once "../Controllers/home.controller.php";
require_once "../Models/home.modelo.php";

class HomeAjax{

    public function getHorasMesActual(){

        $horasMesActual = HomeController::ctrGetHorasMesActual();
        echo json_encode($horasMesActual);
    }


    public function getTripulantesMayorHoras(){

        $tripulantesMayorHoras = HomeController::ctrGetTripulantesMayorHoras();
        echo json_encode($tripulantesMayorHoras);
    }

    public function getAeronavesDisponibles(){

        $AeronavesDisponibles = HomeController::ctrAeronavesDisponibles();
        echo json_encode($AeronavesDisponibles);
    }

    public function vuelosGraficos(){
   
        $vuelosGraficos = HomeController::ctrGetVuelos();
        echo json_encode($vuelosGraficos);
    }
}


// ******************** OBJETOS AJAX ***************

if(isset($_POST['accion']) && $_POST['accion'] == 1){

    $horasMesActual = new HomeAjax();
    $horasMesActual->getHorasMesActual();
}

if(isset($_POST['accion']) && $_POST['accion'] == 2){

    $tripulantesMayorHoras = new HomeAjax();
    $tripulantesMayorHoras->getTripulantesMayorHoras();
}

if(isset($_POST['accion']) && $_POST['accion'] == 3){

    $aeronavesDisponibles = new HomeAjax();
    $aeronavesDisponibles->getAeronavesDisponibles();
}

if(isset($_POST['accion']) && $_POST['accion'] == 4){

    $vuelosGraficos = new HomeAjax();
    $vuelosGraficos->vuelosGraficos();
}