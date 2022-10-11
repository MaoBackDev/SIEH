<?php

require_once "../Controllers/vuelos.controller.php";
require_once "../Controllers/aeronave.controller.php";
require_once "../Controllers/tripulantes.controller.php";
require_once "../Controllers/misiones.controller.php";
require_once "../Controllers/condicion.controller.php";
require_once "../Controllers/cargo.controller.php";
require_once "../Models/vuelos.modelo.php";
require_once "../Models/aeronave.modelo.php";
require_once "../Models/tripulante.modelo.php";
require_once "../Models/misiones.modelo.php";
require_once "../Models/condicion.modelo.php";
require_once "../Models/cargo.modelo.php";

class AjaxVuelo
{

    // EDITAR CATEGORÍAS

    public $idVuelo;

    public function ajaxEditVuelo()
    {

        $item = "idVuelo";
        $valor = $this->idVuelo;
        $respuesta = ControllerVuelo::ctrMostrarVuelos($item, $valor);

        echo json_encode($respuesta);
    }

    // LISTAR VUELOS
    public function ajaxShowVuelo()
    {

        $item = null;
        $valor = null;
        $vuelos = ControllerVuelo::ctrMostrarVuelos($item, $valor);

        // ENVIAR DATOS A LA VISTA
        // var_dump($vuelos);

        $vuelosJson = '{
            "data": [';

        for ($i = 0; $i < count($vuelos); $i++) {

            // SE VINCULA EL AERONAVE
            $item = "idAeronave";
            $valor = $vuelos[$i]["idAeronave"];
            $aeronave = ControllerAeronave::ctrListarAeronave($item, $valor);

            // SE VINCULA EL TRIPULANTE
            $item = "idTripulante";
            $valor = $vuelos[$i]["idTripulante"];
            $tripulante = ControladorTripulante::ctrListarUsuarios($item, $valor);

            // SE VINCULA LA MISIÓN
            $item = "idMision";
            $valor = $vuelos[$i]["idMision"];
            $mision = ControllerMisiones::ctrListarMisiones($item, $valor);

            // SE VINCULA LA CONDICIÓN DE VUELO
            $item = "idCondicion";
            $valor = $vuelos[$i]["idCondicion"];
            $condicion = ControllerCondicion::ctrListarCondicion($item, $valor);

            // SE VINCULA EL CARGO DE VUELO
            $item = "idCargo";
            $valor = $vuelos[$i]["idCargo"];
            $cargo = ControllerCargo::ctrListarCargo($item, $valor);

            /*=============================================
                TRAEMOS LAS ACCIONES
                =============================================*/

            $botones =  "<button class='btn btn-info btnEditVuelo' idVuelo=" . $vuelos[$i]["idVuelo"] . " data-toggle='modal' data-target='#modalEditVuelo' title='Editar'><i class='fa fa-edit'></i></button>";

            $vuelosJson .= '[
                    "' . $vuelos[$i]["fechaVuelo"] . '",
                    "' . $vuelos[$i]["ordenVuelo"] . '",
                    "' . $aeronave['matricula'] . '",
                    "' . $tripulante['apellidos'] . ' ' . $tripulante["nombres"] . '",
                    "' . $mision["tipo_mision"] . '",
                    "' . $condicion["nombreCondicion"] . '",
                    "' . $cargo["nombreCargo"] . '",
                    "' . $vuelos[$i]["hora_inicio"] . '",
                    "' . $vuelos[$i]["hora_final"] . '",
                    "' . $vuelos[$i]["cantidadHora"] . '",
                    "' . $vuelos[$i]["observaciones"] . '",
                    "' . $botones . '"
                  ],';
        }

        $vuelosJson = substr($vuelosJson, 0, -1);

        $vuelosJson .=   '] 
  
        }';

        echo $vuelosJson;
    }
}

// ********************INSTANCIAR EL OBJETO QUE RECIBE EL ID DEL PARA EDITAR **********************************



if (isset($_POST["idVuelo"])) {

    $categoria = new AjaxVuelo();
    $categoria->idVuelo = $_POST["idVuelo"];
    $categoria->ajaxEditVuelo();
} else {
    $vuelos = new AjaxVuelo();
    $vuelos->ajaxShowVuelo();
}
