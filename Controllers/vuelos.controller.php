<?php

class ControllerVuelo
{

	static public function ctrCrearVuelo()
	{
		if (isset($_POST['newOrden'])) {

			if (
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['newOrden']) &&
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['newAeronave']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newMision']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST['newTrip']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newCondicion']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newCondicion'])
			) {

				$tabla = 'vuelo';
				date_default_timezone_set('America/Bogota'); //Definir Zona horaria local

				// Se convierten las variables a formato tipo fecha
				$fecha_ini = date_create($_POST['newFechaInicio']);
				$fecha_fin = date_create($_POST['newFechaFin']);

				// se dá formato horas- minutos - segundos para almacenarlos en la base de datos
				$fecha_ini = date_format($fecha_ini, 'H:i:s');
				$fecha_fin = date_format($fecha_fin, 'H:i:s');

				// Se da formato de número a las variables para calcular el total de horas de vuelo
				$total = strtotime($fecha_fin) - strtotime($fecha_ini);

				// este segmento calcula el total de horas, resultado de la diferencia de la operación anterior. Además valída si un vuelo inicia un día y finaliza en otro y calcula el total de horas
				$total /= 3600;
				if ($total <= 0) {
					$total += 24;
				} else {
					$total = $total;
				}

				// Formato decimal para almacenar las horas
				$total = number_format((float)$total, 1, '.', '');

				$datos = array(
					"ordenVuelo" => $_POST['newOrden'],
					"idAeronave" => $_POST['newAeronave'],
					"fechaVuelo" => date("Y-m-d", strtotime($_POST['newFecha'])),
					"idMision" => $_POST['newMision'],
					"idCondicion" => $_POST['newCondicion'],
					"idTripulante" => $_POST['newIdTripulante'],
					"idCargo" => $_POST['newCargo'],
					"hora_inicio" => $fecha_ini,
					"hora_final" => $fecha_fin,
					"cantidadHora" => $total,
					"observaciones" => $_POST['observaciones']
				);

				$respuesta = ModeloVuelo::mdlCrearVuelo($tabla, $datos);

				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> La orden de vuelo ya existe!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				}

				if ($respuesta == "ok") {
					echo "<script>
                			swal.fire({
                				title: 'El Registro ha sido exitoso',
                				icon: 'success',
                				confirmButtonText: 'Ok',
                				closeOnConfirm: false
                			}).then((result)=>{
                					if(result.value){
                						window.location = 'homeTrip'
                					}
                				})
                		</script>";
				}
			} else {

				echo "<script>
						swal.fire({
							title: 'Los campos no deben tener caracteres especiales.',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'registroVuelos'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR VUELOS PERSONALIZADOS************************************
	static public function ctrListarVuelos($item, $valor)
	{

		$tabla = "vuelo";
		$respuesta = ModeloVuelo::mdlListarVuelos($tabla, $item, $valor);
		return $respuesta;
	}

	// ************************************ LISTAR VUELOS GENERALES************************************
	static public function ctrMostrarVuelos($item, $valor)
	{

		$tabla = "vuelo";
		$respuesta = ModeloVuelo::mdlMostrarVuelos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR VUELOS ****************************************

	static public function ctrEditarVuelo()
	{
		if (isset($_POST['editOrden'])) {

			if (
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['editOrden']) &&
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['editAeronave']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editMision']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST['editTrip']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCondicion']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCargo'])
			) {

				$hora_inicial = $_POST['horaInicioActual'];
				$hora_final = $_POST['horaFinActual'];
				$cantidad = $_POST['cantidadActual'];
				date_default_timezone_set('America/Bogota'); //Definir Zona horaria local

				if ($_POST['editHoraInicio'] != "" && $_POST['editHoraFin'] != "") {
					// Se convierten las variables a formato tipo fecha
					$hora_ini = date_create($_POST['editHoraInicio']);
					$hora_fin = date_create($_POST['editHoraFin']);

					// se dá formato horas- minutos - segundos para almacenarlos en la base de datos
					$hora_ini = date_format($hora_ini, 'H:i:s');
					$hora_fin = date_format($hora_fin, 'H:i:s');

					// Se da formato de número a las variables para calcular el total de horas de vuelo
					$total = strtotime($hora_fin) - strtotime($hora_ini);

					// este segmento calcula el total de horas, resultado de la diferencia de la operación anterior. Además valída si un vuelo inicia un día y finaliza en otro y calcula el total de horas
					$total /= 3600;
					if ($total <= 0) {
						$total += 24;
					} else {
						$total = $total;
					}

					// Formato decimal para almacenar las horas
					$total = number_format((float)$total, 1, '.', '');
				} else {
					$hora_ini = $hora_inicial;
					$hora_fin = $hora_final;
					$total = strtotime($hora_fin) - strtotime($hora_ini);
					$total = number_format((float)$cantidad, 1, '.', '');
				}

				$tabla = 'vuelo';
				$datos = array(
					"ordenVuelo" => $_POST['editOrden'],
					"idAeronave" => $_POST['editAeronave'],
					"fechaVuelo" => date("Y-m-d", strtotime($_POST['editFecha'])),
					"idMision" => $_POST['editMision'],
					"idCondicion" => $_POST['editCondicion'],
					"idTripulante" => $_POST['editTripValue'],
					"idCargo" => $_POST['editCargo'],
					"hora_inicio" => $hora_ini,
					"hora_final" => $hora_fin,
					"cantidadHora" => $total,
					"observaciones" => $_POST['editObservaciones']
				);
				// var_dump($datos);

				try {
					$respuesta = ModeloVuelo::mdlEditarVuelos($tabla, $datos);

						if ($respuesta == "ok") {
							echo "<script>
									swal.fire({
										title: 'El Registro ha sido actualizado',
										icon: 'success',
										confirmButtonText: 'Ok',
										closeOnConfirm: false
									}).then((result)=>{
											if(result.value){
												window.location = 'vuelos'
											}
										})
								</script>";
						}
				} catch (PDOException $e) {
					echo "Error--> : " . $e->getMessage();
				}
			} else {

				echo "<script>
						swal.fire({
							title: 'Los campos no deben tener caracteres especiales.',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'vuelos'
							}
						})
					</script>";
			}
		}
	}
}
