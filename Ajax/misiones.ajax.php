<?php

require_once "../Controllers/misiones.controller.php";
require_once "../Models/misiones.modelo.php";

class AjaxMisiones{

    // EDITAR AERONAVES

    public $idMision;

    public function ajaxEditMision(){

        $item = "idMision";
        $valor = $this->idMision;
        $respuesta = ControllerMisiones::ctrListarMisiones($item, $valor);

        echo json_encode($respuesta);
    }

}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DEl AERONAVE PARA EDITAR ********************************************

if(isset($_POST["idMision"])){

    $aeronave = new AjaxMisiones();
    $aeronave->idMision = $_POST["idMision"];
    $aeronave->ajaxEditMision();
}
