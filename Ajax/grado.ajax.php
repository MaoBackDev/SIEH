<?php

require_once "../Controllers/grado.controller.php";
require_once "../Models/grado.modelo.php";

class AjaxGrado{

    // EDITAR GRADO

    public $idGrado;

    public function ajaxEditGrado(){

        $item = "idGrado";
        $valor = $this->idGrado;
        $respuesta = ControllerGrado::ctrListarGrados($item, $valor);

        echo json_encode($respuesta);
    }
}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DE LA CATEGORÍA PARA EDITAR ********************************************

if(isset($_POST["idGrado"])){

    $grado = new AjaxGrado();
    $grado->idGrado = $_POST["idGrado"];
    $grado->ajaxEditGrado();
}

// ******************** INSTANCIAR EL OBJETO QUE RECIBE EL ID Y EL ESTADO DE LA CATEGORÍA PARA ACTIVAR O DESACTIVAR *******************************
