<?php

require_once "../Controllers/aeronave.controller.php";
require_once "../Models/aeronave.modelo.php";

class AjaxAeronave{

    // EDITAR AERONAVES

    public $idAeronave;

    public function ajaxEditAeronave(){

        $item = "idAeronave";
        $valor = $this->idAeronave;
        $respuesta = ControllerAeronave::ctrListarAeronave($item, $valor);

        echo json_encode($respuesta);
    }

}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DEl AERONAVE PARA EDITAR ********************************************

if(isset($_POST["idAeronave"])){

    $aeronave = new AjaxAeronave();
    $aeronave->idAeronave = $_POST["idAeronave"];
    $aeronave->ajaxEditAeronave();
}
