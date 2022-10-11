<?php

class ControllerMisiones
{

	// AGREGAR 	MISIONES
	static public function ctrCrearMision()
	{
		if (isset($_POST['newMision'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newMision']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newCodMision'])
			) {
				$tabla = 'misiones';
				$datos = array(
					"tipo_mision" => $_POST['newMision'],
					"codigo" => $_POST['newCodMision'],
				);
				// var_dump($datos);
				$respuesta = ModeloMisiones::mdlCrearMisiones($tabla, $datos);

				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El tipo de misión no está disponible. Por favor Ingrese otro tipo!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				} else if ($respuesta == 'errorCod') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El código no está disponible. Por favor Ingrese otro código!
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
										window.location = 'misiones'
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
								window.location = 'misiones'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR MISIONES ************************************
	static public function ctrListarMisiones($item, $valor)
	{

		$tabla = "misiones";
		$respuesta = ModeloMisiones::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR MISIONES ****************************************

	static public function ctrEditarMisiones()
	{
		if (isset($_POST['editMision'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editMision']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCodMision'])
			) {
				$tabla = 'misiones';
				$datos = array(
					"tipo_mision" => $_POST['editMision'],
					"codigo" => $_POST['editCodMision'],
					"idMision" => $_POST['editIdMision']
				);
				// var_dump($datos);
				
				$respuesta = ModeloMisiones::mdlEditarMisiones($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
								swal.fire({
									title: 'El Registro ha sido actualizado Correctamente',
									icon: 'success',
									confirmButtonText: 'Ok',
								}).then((result)=>{
										if(result.value){
											window.location = 'misiones'
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
									window.location = 'misiones'
								}
							})
						</script>";
			}
		}
	}
}
