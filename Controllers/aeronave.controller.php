<?php

class ControllerAeronave
{

	// AGREGAR CATEGORÍAS
	static public function ctrCrearAeronave()
	{
		if (isset($_POST['newMatricula'])) {

			if (
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['newMatricula']) &&
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['tipoAeronave'])
			) {
				$tabla = 'Aeronaves';
				$datos = array(
					"matricula" => $_POST['newMatricula'],
					"tipoAeronave" => $_POST['tipoAeronave'],
				);
				// var_dump($datos);
				$respuesta = ModeloAeronave::mdlCrearAeronave($tabla, $datos);

				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> La matrícula no está disponible. Por favor Ingrese una matrícula diferente!
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
										window.location = 'aeronaves'
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
								window.location = 'aeronaves'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR CATEGORÍAS ************************************
	static public function ctrListarAeronave($item, $valor)
	{

		$tabla = "aeronaves";
		$respuesta = ModeloAeronave::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR CARGO ****************************************

	static public function ctrEditarAeronave()
	{
		if (isset($_POST['editMatricula'])) {

			if (
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['editMatricula']) &&
				preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['editTipoAeronave']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editEstadoAeronave'])
			) {
				$tabla = 'aeronaves';
				$datos = array(
					"matricula" => $_POST['editMatricula'],
					"tipoAeronave" => $_POST['editTipoAeronave'],
					"estado" => $_POST['editEstadoAeronave'],
					"idAeronave" => $_POST['editIdAeronave']
				);
				// var_dump($datos);
				
				$respuesta = ModeloAeronave::mdlEditarAeronave($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
								swal.fire({
									title: 'El Registro ha sido actualizado Correctamente',
									icon: 'success',
									confirmButtonText: 'Ok',
								}).then((result)=>{
										if(result.value){
											window.location = 'aeronaves'
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
									window.location = 'aeronaves'
								}
							})
						</script>";
			}
		}
	}
}
