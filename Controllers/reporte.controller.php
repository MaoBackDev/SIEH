<?php

class ReporteController{

    static public function ctrReportes(){

        if(isset($_POST['f_ini']) && isset($_POST['f_fin'])){
            $f_ini = date("Y-m-d", strtotime($_POST['f_ini']));
            $f_fin = date("Y-m-d", strtotime($_POST['f_fin']));
            $respuesta = ReporteModelo::mdlReportesRangoFecha($f_ini, $f_fin);

            if($respuesta != ""){
                
                foreach ($respuesta as $key => $value) {

                    echo '<tr> 
                            <td>' .date('d/m/y',strtotime( $value["fechaVuelo"])) .'</td>
                            <td>' . $value["ordenVuelo"] .'</td>';

                            // AGREGAR MATRICULA AERONAVE
                            $item = 'idAeronave';
                            $valor = $value['idAeronave'];
                            $aeronave = ControllerAeronave::ctrListarAeronave($item, $valor);
                            echo '<td>' . $aeronave["matricula"] . '</td>';

                            // AGREGAR GRADO Y NOMBRE TRIPULANTE
                            $item = 'idTripulante';
                            $valor = $value['idTripulante'];
                            $tripulante = ControladorTripulante::ctrListarUsuarios($item, $valor);
                            echo '<td>'  . $tripulante["apellidos"] . " " . $tripulante["nombres"] . '</td>';


                            // AGREGAR TIPO DE MISIÓN
                            $item = 'idMision';
                            $valor = $value['idMision'];
                            $mision = ControllerMisiones::ctrListarMisiones($item, $valor);
                            echo '<td>' . $mision["tipo_mision"] . '</td>';

                            // AGREGAR CONDICIÓN VUELO
                            $item = 'idCondicion';
                            $valor = $value['idCondicion'];
                            $condicion = ControllerCondicion::ctrListarCondicion($item, $valor);
                            echo '<td>' . $condicion["nombreCondicion"] . '</td>';

                            // AGREGAR CARGO VUELO
                            $item = 'idCargo';
                            $valor = $value['idCargo'];
                            $cargo = ControllerCargo::ctrListarCargo($item, $valor);
                            echo '<td>' . $cargo["nombreCargo"] . '</td>';

                            echo '<td>' . $value["hora_inicio"] . '</td>
                            <td>' . $value["hora_final"] . '</td>
                            <td>' . $value["cantidadHora"] . '</td>
                            <td>' . $value["observaciones"] . '</td>
                        </tr>';
                }
            }
                  
        }
        if(isset($_POST['AllRegisters'])){

            $tabla = "vuelo";
            $item= null;
            $valor = null;
            $vuelos = ModeloVuelo::mdlMostrarVuelos($tabla,$item, $valor);
            
            if($vuelos != ''){
                foreach ($vuelos as $key => $value) {

                    echo '<tr> 
                            <td>' .date('d/m/y',strtotime( $value["fechaVuelo"])) .'</td>
                            <td>' . $value["ordenVuelo"] .'</td>';
    
                            // AGREGAR MATRICULA AERONAVE
                            $item = 'idAeronave';
                            $valor = $value['idAeronave'];
                            $aeronave = ControllerAeronave::ctrListarAeronave($item, $valor);
                            echo '<td>' . $aeronave["matricula"] . '</td>';
    
                            // AGREGAR GRADO Y NOMBRE TRIPULANTE
                            $item = 'idTripulante';
                            $valor = $value['idTripulante'];
                            $tripulante = ControladorTripulante::ctrListarUsuarios($item, $valor);
                            echo '<td>'  . $tripulante["apellidos"] . " " . $tripulante["nombres"] . '</td>';
    
    
                            // AGREGAR TIPO DE MISIÓN
                            $item = 'idMision';
                            $valor = $value['idMision'];
                            $mision = ControllerMisiones::ctrListarMisiones($item, $valor);
                            echo '<td>' . $mision["tipo_mision"] . '</td>';
    
                            // AGREGAR CONDICIÓN VUELO
                            $item = 'idCondicion';
                            $valor = $value['idCondicion'];
                            $condicion = ControllerCondicion::ctrListarCondicion($item, $valor);
                            echo '<td>' . $condicion["nombreCondicion"] . '</td>';
    
                            // AGREGAR CARGO VUELO
                            $item = 'idCargo';
                            $valor = $value['idCargo'];
                            $cargo = ControllerCargo::ctrListarCargo($item, $valor);
                            echo '<td>' . $cargo["nombreCargo"] . '</td>';
    
                            echo '<td>' . $value["hora_inicio"] . '</td>
                            <td>' . $value["hora_final"] . '</td>
                            <td>' . $value["cantidadHora"] . '</td>
                            <td>' . $value["observaciones"] . '</td>
                        </tr>';
                }
            }
        }
    }

    static public function ctrTotalHoras(){

        $tabla = 'vuelo';
        $respuesta = ModeloVuelo::mdlSumaHoras($tabla);
        return $respuesta;
    }


    static public function ctrTotalHorasIndividual($item, $valor){

        $tabla = 'vuelo';
        $respuesta = ModeloVuelo::mdlSumaHorasIndividual($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrTotalHorasIndividualMes($item, $valor){

        $tabla = 'vuelo';
        $respuesta = ModeloVuelo::mdlSumaHorasIndividualMes($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrVueloMayor($item, $valor){

        $tabla = 'vuelo';
        $respuesta = ModeloVuelo::mdlVueloMayor($tabla, $item, $valor);
        return $respuesta;
    }
}
