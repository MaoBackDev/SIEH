<?php

require_once "../Controllers/condicion.controller.php";
require_once "../Models/condicion.modelo.php";

class AjaxCondicion{

    // EDITAR CATEGORÍAS

    public $idCondicion;

    public function ajaxEditCondicion(){

        $item = "idCondicion";
        $valor = $this->idCondicion;
        $respuesta = ControllerCondicion::ctrListarCondicion($item, $valor);

        echo json_encode($respuesta);
    }


     // ACTIVAR USUARIO
    //  public $activarId;
    //  public $activarCategoria;
    //  public function ajaxActivarCategoria(){

    //   $tabla = 'categoria';
    //   $item1 = 'estado';
    //   $valor1 = $this->activarCategoria;
    //   $item2 = 'idCategoria';
    //   $valor2 = $this->activarId;
    //   $respuesta =ModeloCategoria::mdlActivarCategoria($tabla,$item1,$valor1,$item2,$valor2);
    // }
}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DE LA CATEGORÍA PARA EDITAR ********************************************

if(isset($_POST["idCondicion"])){

    $condicion = new Ajaxcondicion();
    $condicion->idCondicion = $_POST["idCondicion"];
    $condicion->ajaxEditCondicion();
}

// ******************** INSTANCIAR EL OBJETO QUE RECIBE EL ID Y EL ESTADO DE LA CATEGORÍA PARA ACTIVAR O DESACTIVAR *******************************

// if(isset($_POST["activarCategoria"])){

//     $activar = new AjaxCategoria();
//     $activar->activarCategoria = $_POST["activarCategoria"];
//     $activar->activarId = $_POST["activarId"];
//     $activar->ajaxActivarCategoria();
// }