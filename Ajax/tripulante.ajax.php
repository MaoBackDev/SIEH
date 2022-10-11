<?php

require_once "../Controllers/tripulantes.controller.php";
require_once "../Models/tripulante.modelo.php";

class AjaxTripulante{

    // ********************************** EDITAR TRIPULANTES ***********************************

    public $idTripulante; //Vaiable para almacenar el valor del id que se envía desde javascript

    public function ajaxEditarTripulante(){
        
        $item = 'idTripulante';
        $valor = $this->idTripulante; //Toma el valor de la variable post de la linea 16
        $respuesta = ControladorTripulante::ctrListarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

     // ********************************** EDITAR PERFIL ***********************************

    public $trip;

    public function ajaxEditarPerfil(){
        
        $item = 'idTripulante';
        $valor = $this->trip;
        $respuesta = ControladorTripulante::ctrListarUsuarios($item, $valor);

        echo json_encode($respuesta);

    }

     //    VALIDAR QUE NO SE REPITAN USUARIOS EN LA BASE DE DATOS
     public $validarTripulante;
     public function ajaxValidarTripulante(){
         $item = 'documento';
         $valor = $this->validarTripulante;
         $respuesta = ControladorTripulante::ctrListarUsuarios($item, $valor);
         echo json_encode($respuesta);
     }

       // ACTIVAR TRIPULANTES DESDE EL BOTÓN

       public $activar_id_trip;
       public $activarTripulante;
       public function ajaxActivarTripulante(){
  
        $tabla = 'tripulante';
        $item1 = 'estado';
        $valor1 = $this->activarTripulante;
        $item2 = 'idTripulante';
        $valor2 = $this->activar_id_trip;
        $respuesta =ModeloTripulante::mdlActivarTripulante($tabla,$item1,$valor1,$item2,$valor2);
      }
}


// ********************************** OBJETO EDITAR TRIPULANTE ***********************************

if (isset($_POST['idTripulante'])) {
    $editar = new AjaxTripulante(); 
    $editar->idTripulante = $_POST['idTripulante'];
    $editar->ajaxEditarTripulante();
}

// ********************************** OBJETO EDITAR PERFIL ***********************************

if (isset($_POST['trip'])) {
    $perfil = new AjaxTripulante(); 
    $perfil->trip = $_POST['trip'];
    $perfil->ajaxEditarPerfil();
}

// ********************************** OBJETO VALIDAR TRIPULANTE ***********************************

if (isset($_POST['validarTripulante'])) {
    $validar = new AjaxTripulante(); 
    $validar->validarTripulante = $_POST['validarTripulante'];
    $validar->ajaxValidarTripulante();
}

// ***************** INSTANCIAR EL OBJETO QUE RECIBE EL ID Y EL ESTADO DEL TRIPULANTE PARA ACTIVAR O DESACTIVAR ********************

if(isset($_POST["activarTripulante"])){

    $activar = new AjaxTripulante();
    $activar->activarTripulante = $_POST["activarTripulante"];
    $activar->activar_id_trip = $_POST["activar_id_trip"];
    $activar->ajaxActivarTripulante();
}
