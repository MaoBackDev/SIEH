<?php

class ControllerCargo
{

	// AGREGAR CATEGORÍAS
	static public function ctrCrearCargo()
	{
		if (isset($_POST['newCargo'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newCargo']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['newCodCargo'])
			) {
				$tabla = 'cargo_vuelo';
				$datos = array(
					"nombreCargo" => $_POST['newCargo'],
					"abreCargo_vuelo" => $_POST['newCodCargo']
				);
				// var_dump($datos);
				$respuesta = ModeloCargo::mdlCrearCargo($tabla, $datos);

				if($respuesta == 'error'){

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El cargo de vuelo no está disponible. Por favor intente Ingresar otro cargo!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				}else if($respuesta == 'errorCod'){

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El código no está disponible. Por favor intente Ingresar otro código!
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
										window.location = 'cargos'
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
								window.location = 'cargos'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR CATEGORÍAS ************************************
	static public function ctrListarCargo($item, $valor)
	{

		$tabla = "cargo_vuelo";
		$respuesta = ModeloCargo::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR CARGO ****************************************

	static public function ctrEditarCargo()
	{
		if (isset($_POST['editCargo'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCargo']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['editCodCargo'])
			) {
				$tabla = 'cargo_vuelo';
				$datos = array(
					"nombreCargo" => $_POST['editCargo'],
					"abreCargo_vuelo" => $_POST['editCodCargo'],
					"idCargo" => $_POST['editIdCargo']
				);
				// var_dump($datos);
				
				$respuesta = ModeloCargo::mdlEditarCargo($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
								swal.fire({
									title: 'El Registro ha sido actualizado Correctamente',
									icon: 'success',
									confirmButtonText: 'Ok',
								}).then((result)=>{
										if(result.value){
											window.location = 'cargos'
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
									window.location = 'cargos'
								}
							})
						</script>";
			}
		}
	}
}
