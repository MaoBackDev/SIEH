<?php

require_once "../Controllers/cargo.controller.php";
require_once "../Models/cargo.modelo.php";

class AjaxCargo{

    // EDITAR CARGOS

    public $idCargo;

    public function ajaxEditCargo(){

        $item = "idCargo";
        $valor = $this->idCargo;
        $respuesta = ControllerCargo::ctrListarCargo($item, $valor);

        echo json_encode($respuesta);
    }

}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DE LA CATEGORÍA PARA EDITAR ********************************************

if(isset($_POST["idCargo"])){

    $condicion = new AjaxCargo();
    $condicion->idCargo = $_POST["idCargo"];
    $condicion->ajaxEditCargo();
}
