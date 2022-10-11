<?php

class ControllerCondicion
{

	// AGREGAR CATEGORÍAS
	static public function ctrCrearCondicion()
	{
		if (isset($_POST['newCondicion'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newCondicion']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['newCodCondicion'])
			) {
				$tabla = 'condicion_vuelo';
				$datos = array(
					"nombreCondicion" => $_POST['newCondicion'],
					"abreCondicion_vuelo" => $_POST['newCodCondicion']
				);
				// var_dump($datos);
				$respuesta = ModeloCondicion::mdlCrearCondicion($tabla, $datos);

				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> La condición de vuelo no está disponible. Por favor Ingrese otra condición!
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
										window.location = 'condiciones'
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
								window.location = 'condiciones'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR CATEGORÍAS ************************************
	static public function ctrListarCondicion($item, $valor)
	{

		$tabla = "condicion_vuelo";
		$respuesta = ModeloCondicion::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR CONDICION ****************************************

	static public function ctrEditarCondicion()
	{
		if (isset($_POST['editCondicion'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCondicion']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['editCodCondicion'])
			) {
				$tabla = 'condicion_vuelo';
				$datos = array(
					"nombreCondicion" => $_POST['editCondicion'],
					"abreCondicion_vuelo" => $_POST['editCodCondicion'],
					"idCondicion" => $_POST['editIdCondicion']
				);
				// var_dump($datos);
				
				$respuesta = ModeloCondicion::mdlEditarCondicion($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
								swal.fire({
									title: 'El Registro ha sido actualizado Correctamente',
									icon: 'success',
									confirmButtonText: 'Ok',
								}).then((result)=>{
										if(result.value){
											window.location = 'condiciones'
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
									window.location = 'condiciones'
								}
							})
						</script>";
			}
		}
	}
}
