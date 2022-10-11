<?php

class HomeController{

    static public function ctrGetHorasMesActual(){

        $datos = HomeModelo::mdlGetHorasMesActual();
        return $datos;
    }

    static public function ctrGetTripulantesMayorHoras(){

        $datos = HomeModelo::mdlGetTripulantesMayorHoras();
        return $datos;

    }

    static public function ctrAeronavesDisponibles(){

        $datos = HomeModelo::mdlAeronavesDisponibles();
        return $datos;

    }

    static public function ctrGetVuelos(){

        $datos = HomeModelo::getVuelos();
        return $datos;

    }
}