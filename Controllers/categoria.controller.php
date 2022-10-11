<?php

class ControllerCategoria
{

	// AGREGAR CATEGORÍAS
	static public function ctrCrearCategoria()
	{
		if (isset($_POST['categoria'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['categoria']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['codigo'])
			) {
				$tabla = 'categoria';
				$datos = array(
					"nombreCategoria" => $_POST['categoria'],
					"abrCategoria" => $_POST['codigo']
				);
				$respuesta = ModeloCategoria::mdlCrearCategoria($tabla, $datos);

				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> La categoría de vuelo no está disponible. Por favor intente Ingresar otra categoría!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>';
				} else if ($respuesta == 'errorCod') {

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
										window.location = 'categorias'
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
								window.location = 'categorias'
							}
						})
					</script>";
			}
		}
	}

	// ************************************ LISTAR CATEGORÍAS ************************************
	static public function ctrListarCategorias($item, $valor)
	{

		$tabla = "categoria";
		$respuesta = ModeloCategoria::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ****************************************** EDITAR CATEGORÍAS ****************************************

	static public function ctrEditarCategoria()
	{
		if (isset($_POST['editCategoria'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editCategoria']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['editCodigo'])
			) {
				$tabla = 'categoria';
				$datos = array(
					"nombreCategoria" => $_POST['editCategoria'],
					"abrCategoria" => $_POST['editCodigo'],
					"idCategoria" => $_POST['idEditCategoria']
				);

				$respuesta = ModeloCategoria::mdlEditarCategoria($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
								swal.fire({
									title: 'El Registro ha sido actualizado Correctamente',
									icon: 'success',
									confirmButtonText: 'Ok',
								}).then((result)=>{
										if(result.value){
											window.location = 'categorias'
										}
									})
							</script>";
				} else {
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
									window.location = 'categorias'
								}
							})
						</script>";
			}
		}
	}
}
