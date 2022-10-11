<?php
require_once "../Controllers/tripulantes.controller.php";
require_once "../Controllers/grado.controller.php";
require_once "../Controllers/categoria.controller.php";
require_once "../Models/tripulante.modelo.php";
require_once "../Models/grado.modelo.php";
require_once "../Models/categoria.modelo.php";

class TablaTripulantes
{
    public function ajaxMostrarTablaTripulantes()
    {

        // llamar al método que lista los usuarios
        $item = null;
        $valor = null;
        $tripulantes = ControladorTripulante::ctrListarUsuarios($item, $valor);

        // var_dump($tripulantes);


        $datosJson = '{
            "data": [';

        for ($i = 0; $i < count($tripulantes); $i++) {

            /*=============================================
                TRAEMOS LA IMAGEN
                =============================================*/

            if (empty($tripulantes[$i]["foto"])) {
                $imagen = "<img src='Views/img/avatar-pilot.png' width='40px'>";
                
            } else {
                $imagen = "<img src='" . $tripulantes[$i]["foto"] . "' width='40px'>";
            }

            /*=============================================
                TRAEMOS LA CATEGORÍA
                =============================================*/

            $item = "idCategoria";
            $valor = $tripulantes[$i]["id_categoria"];

            $categoria = ControllerCategoria::ctrListarCategorias($item, $valor);

            /*=============================================
                TRAEMOS EL GRADO
                =============================================*/

            $item = "idGrado";
            $valor = $tripulantes[$i]["id_grado"];

            $grado = ControllerGrado::ctrListarGrados($item, $valor);

            /*=============================================
                ESTADO
                =============================================*/
            if ($tripulantes[$i]['estado'] != 0) {
                $estado = "<td><button class='btn btn-success btn-sm btn-active-trip' act-tripulante=" . $tripulantes[$i]["idTripulante"] . " estadoTripulante='0'>Activado</button></td>";
            } else {
                $estado = "<td><button class='btn btn-danger btn-sm btn-active-trip' act-tripulante=" . $tripulantes[$i]["idTripulante"] . " estadoTripulante='1'>Desactivado</button></td>";
            }


            /*=============================================
                TRAEMOS LAS ACCIONES
                =============================================*/

            $botones =  "<button class='btn btn-info btnEditarTrip' idTripulante=" . $tripulantes[$i]["idTripulante"] . " data-toggle='modal' data-target='#modalEditTrip' title='Editar'><i class='fa fa-edit'></i></button>";

            $datosJson .= '[
                    "' . $imagen . '",
                    "' . $grado['abreGrado'] . '",
                    "' . $tripulantes[$i]["apellidos"] . '",
                    "' . $tripulantes[$i]["nombres"] . '",
                    "' . $tripulantes[$i]["documento"] . '",
                    "' . $estado . '",
                    "' . $tripulantes[$i]["fecha_nacimiento"] . '",
                    "' . $tripulantes[$i]["fecha_promocion"] . '",
                    "' . $tripulantes[$i]["certificado_medico"] . '",
                    "' . $tripulantes[$i]["codigo_militar"] . '",
                    "' . $tripulantes[$i]["correo"] . '",
                    "' . $tripulantes[$i]["rol"] . '",
                    "' . $categoria["abrCategoria"] . '",
                    "' . $botones . '"
                  ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 
  
           }';

        echo $datosJson;
    }
}


$mostrarTripulantes = new TablaTripulantes();
$mostrarTripulantes->ajaxMostrarTablaTripulantes();
