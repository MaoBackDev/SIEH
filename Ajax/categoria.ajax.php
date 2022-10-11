<?php

require_once "../Controllers/categoria.controller.php";
require_once "../Models/categoria.modelo.php";

class AjaxCategoria{

    // EDITAR CATEGORÍAS

    public $categoriaId;

    public function ajaxEditCategoria(){

        $item = "idCategoria";
        $valor = $this->categoriaId;
        $respuesta = ControllerCategoria::ctrListarCategorias($item, $valor);

        echo json_encode($respuesta);
    }


     // ACTIVAR USUARIO
     public $activarId;
     public $activarCategoria;
     public function ajaxActivarCategoria(){

      $tabla = 'categoria';
      $item1 = 'estado';
      $valor1 = $this->activarCategoria;
      $item2 = 'idCategoria';
      $valor2 = $this->activarId;
      $respuesta =ModeloCategoria::mdlActivarCategoria($tabla,$item1,$valor1,$item2,$valor2);
    }
}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DE LA CATEGORÍA PARA EDITAR ********************************************

if(isset($_POST["categoriaId"])){

    $categoria = new AjaxCategoria();
    $categoria->categoriaId = $_POST["categoriaId"];
    $categoria->ajaxEditCategoria();
}

// ******************** INSTANCIAR EL OBJETO QUE RECIBE EL ID Y EL ESTADO DE LA CATEGORÍA PARA ACTIVAR O DESACTIVAR *******************************

if(isset($_POST["activarCategoria"])){

    $activar = new AjaxCategoria();
    $activar->activarCategoria = $_POST["activarCategoria"];
    $activar->activarId = $_POST["activarId"];
    $activar->ajaxActivarCategoria();
}