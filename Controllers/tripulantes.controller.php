<?php

class ControladorTripulante
{

	// MÉTODO PARA CREAR TRIPULANTES
	static public function ctrCrearTripulante()
	{
		if (isset($_POST["documento"])) {

			if (
				preg_match('/^[0-9]+$/', $_POST['documento']) &&
				preg_match('/^[0-9]+$/', $_POST['codigo_militar']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['apellidos']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombres']) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['clave'])
			) {

				// VALIDAR FOTO 
				$ruta = "";
				if (isset($_FILES['foto']['tmp_name'])) {

					// CREAR CARPETA PARA ALMACENAR LA FOTO
					$directorio = "Views/img/img_tripulantes/" . $_POST['documento'];
					mkdir($directorio, 0755);

					// De acuerdo al tipo de imagen se aplican acciones por defecto de PHP
					if ($_FILES['foto']['type'] == 'image/jpeg') {

						//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
						$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
						$ruta =  "Views/img/img_tripulantes/" . $_POST['documento'] . "/" . $aleatorio . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['foto']['tmp_name']);
						imagejpeg($origen, $ruta);
					}

					if ($_FILES['foto']['type'] == 'image/png') {

						//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
						$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
						$ruta = "Views/img/img_tripulantes/" . $_POST['documento'] . "/" . $aleatorio . ".png";
						$origen = imagecreatefrompng($_FILES['foto']['tmp_name']);
						imagejpeg($origen, $ruta);
					}
				}

				$tabla = 'tripulante';

				// ENCRIPTAR CONTRASEÑA
				$salt = md5($_POST['clave']);
				$passEncriptado = crypt($_POST['clave'], $salt);

				$datos = array(
					'documento' => $_POST["documento"],
					'codigo_militar' => $_POST["codigo_militar"],
					'apellidos' => $_POST["apellidos"],
					'nombres' => $_POST["nombres"],
					'correo' => $_POST["correo"],
					'clave' => $passEncriptado,
					'fecha_nacimiento' => date("Y-m-d", strtotime($_POST['fecha_nacimiento'])),
					'fecha_promocion' => date("Y-m-d", strtotime($_POST['fecha_promocion'])),
					'certificado_medico' => date("Y-m-d", strtotime($_POST['certificado_medico'])),
					'rol' => $_POST["rol"],
					'id_categoria' => $_POST['categoria'],
					'id_grado' => $_POST['grado'],
					'foto' => $ruta
				);

				// var_dump($datos);

				$respuesta = ModeloTripulante::mdlCrearTripulante($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
							swal.fire({
								title: 'Bien Hecho',
								text: 'Registro exitoso',
								icon: 'success',
								confirmButtonText: 'Ok',
								closeOnConfirm: false
							}).then((result)=>{
									if(result.value){
										window.location = 'tripulantes'
									}
								})
						</script>";
				}
			} else {

				echo "<script>
						swal.fire({
							title: 'Oops',
							text: 'No puedes usar caracteres especiales',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'tripulantes'
							}
						})
					</script>";
			}
		}
	}


	// MÉTODO PARA INGRESAR AL SISTEMA
	static public function ctrIngresoUsuario()
	{
		if (isset($_POST['ingUser'])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUser']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPass'])
			) {

				$salt = md5($_POST['ingPass']);
				$passEncriptado = crypt($_POST['ingPass'], $salt);

				$tabla = 'tripulante';
				$item = 'documento';
				$valor = $_POST['ingUser'];

				$respuesta = ModeloTripulante::mdlMostrarDatos($tabla, $item, $valor);

				if (!$respuesta) {

					echo '<br/><div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El usuario no hace parte del sistema.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  			<span aria-hidden="true">&times;</span>
							</button>
				  		</div>';
				} else if ($respuesta['documento'] == $_POST['ingUser'] && $respuesta['clave'] == $passEncriptado) {

					// VALIDAR ESTADO DEL TRIPULANTE PARA INGRESAR AL SISTEMA Y CREAR VARIABLES DE SESIÓN
					if ($respuesta['estado'] == 1 && $respuesta['rol'] == "Administrador") {

						$_SESSION['foto'] = $respuesta['foto'];
						$_SESSION['login'] = 'ok';
						$_SESSION['id'] = $respuesta['idTripulante'];
						$_SESSION['rol'] = $respuesta['rol'];
						$_SESSION['clave'] = $respuesta['clave'];
						$_SESSION['documento'] = $respuesta['documento'];
						$_SESSION['nombres'] = $respuesta['apellidos'] . ' ' . $respuesta['nombres'];

						// Se crea el objeto para traer el grado
						$item = 'idGrado';
						$valor = $respuesta['id_grado'];
						$grado = ControllerGrado::ctrListarGrados($item, $valor);
						$_SESSION['grado'] = $grado['abreGrado'] . ". ";
						echo '<script>window.location="home"</script>';

					} else if ($respuesta['estado'] == 1 && $respuesta['rol'] == "Usuario") {
						$_SESSION['login'] = 'ok';
						$_SESSION['foto'] = $respuesta['foto'];
						$_SESSION['id'] = $respuesta['idTripulante'];
						$_SESSION['rol'] = $respuesta['rol'];
						$_SESSION['documento'] = $respuesta['documento'];
						$_SESSION['nombres'] = $respuesta['apellidos'] . ' ' . $respuesta['nombres'];

						// Se crea el objeto para traer el grado
						$item = 'idGrado';
						$valor = $respuesta['id_grado'];
						$grado = ControllerGrado::ctrListarGrados($item, $valor);
						$_SESSION['grado'] = $grado['abreGrado'] . ". ";
						echo '<script>window.location="homeTrip"</script>';
					} else {
						echo '<br/><div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong>  La cuenta no está activa. Por favor consulte con su administrador.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  			<span aria-hidden="true">&times;</span>
							</button>
				  		</div>';
					}
				} else if ($respuesta['documento'] == $_POST['ingUser'] && $respuesta['clave'] != $passEncriptado) {
					echo '<br/><div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> Contraseña Inválida.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  			<span aria-hidden="true">&times;</span>
							</button>
				  		</div>';
				}
			}
		}
	}

	// MÉTODO PARA LISTAR USUARIOS EN EL SISTEMA

	static function ctrListarUsuarios($item, $valor)
	{
		$tabla = 'tripulante';
		$respuesta = ModeloTripulante::mdlMostrarDatos($tabla, $item, $valor);
		return $respuesta;
	}


	// ********************************** EDITAR TRIPULANTES ***********************************

	static public function ctrEditarTripulante()
	{
		if (isset($_POST["editDocumento"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editApellidos']) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editNombres']) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editCorreo"])
			) {

				// VALIDAR FOTO 
				$ruta = $_POST['fotoActual'];
				if (isset($_FILES['editarFoto']['tmp_name']) && !empty($_FILES['editarFoto']['tmp_name'])) {

					// CREAR CARPETA PARA ALMACENAR LA FOTO
					$directorio = "Views/img/img_tripulantes/" . $_POST['editDocumento'];

					//VALIDAR SI YA EXISTE LA FOTO PARA NO CREAR UN DIRECTORIO NUEVO CON LA MISMA FOTO
					if (!empty($_POST['fotoActual'])) {
						unlink($_POST['fotoActual']); //elimina la ruta de la foto 
					} else {
						mkdir($directorio, 0755);
					}

					// De acuerdo al tipo de imagen se aplican acciones por defecto de PHP
					if ($_FILES['editarFoto']['type'] == 'image/jpeg') {

						//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
						$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
						$ruta =  "Views/img/img_tripulantes/" . $_POST['editDocumento'] . "/" . $aleatorio . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
						imagejpeg($origen, $ruta);
					}

					if ($_FILES['editarFoto']['type'] == 'image/png') {

						//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
						$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
						$ruta = "Views/img/img_tripulantes/" . $_POST['editDocumento'] . "/" . $aleatorio . ".png";
						$origen = imagecreatefrompng($_FILES['editarFoto']['tmp_name']);
						imagepng($origen, $ruta);
					}
				}

				$tabla = 'tripulante';

				// VALIDAR SI SE ENVÍA CONTRASEÑA NUEVA

				if ($_POST['editClave'] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['editClave'])) {
						// ENCRIPTAR CONTRASEÑA
						$salt = md5($_POST['editClave']);
						$passEncriptado = crypt($_POST['editClave'], $salt);
					} else {
						echo "<script>
						swal.fire({
							title: 'Oops',
							text: 'No puedes usar caracteres especiales en la contraseña',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'tripulantes'
							}
						})
					</script>";
					}
				} else {
					$passEncriptado = $_POST['claveActual'];
				}

				$datos = array(
					'documento' => $_POST["editDocumento"],
					'codigo_militar' => $_POST["edit_codigo_militar"],
					'apellidos' => $_POST["editApellidos"],
					'nombres' => $_POST["editNombres"],
					'correo' => $_POST["editCorreo"],
					'clave' => $passEncriptado,
					'fecha_nacimiento' => date("Y-m-d", strtotime($_POST['edit_fecha_nacimiento'])),
					'fecha_promocion' => date("Y-m-d", strtotime($_POST['edit_fecha_promocion'])),
					'certificado_medico' => date("Y-m-d", strtotime($_POST['edit_certificado_medico'])),
					'rol' => $_POST["editRol"],
					'estado' => $_POST["estado"],
					'id_categoria' => $_POST['editCategoria'],
					'id_grado' => $_POST['editGrado'],
					'foto' => $ruta,
					// 'idTripulante' => $_POST['idTripulante']
				);
				// var_dump($datos);
				$respuesta = ModeloTripulante::mdlEditarTripulante($tabla, $datos);

				if ($respuesta == "ok") {
					echo "<script>
							swal.fire({
								title: 'El Registro ha sido actualizado Correctamente',
								icon: 'success',
								confirmButtonText: 'Ok',
							}).then((result)=>{
									if(result.value){
										window.location = 'tripulantes'
								}
							})
						</script>";
				}
			} else {

				echo "<script>
						swal.fire({
							title: 'No puedes usar caracteres especiales',
							icon: 'error',
							confirmButtonText: 'Ok',
						}).then((result)=>{
							if(result.value){
								window.location = 'tripulantes'
							}
						})
					</script>";
			}
		}
	}

	// ********************************** FUNCIONES PARA FORMATEAR FECHAS EN ESPAÑOL ***********************************

	static public function fechaEs($fecha)
	{
		$fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		return $numeroDia . " de " . $nombreMes . " de " . $anio;
	}

	static public function fechaEsDia($fecha)
	{
		$fecha = substr($fecha, 0, 10);
		$numeroDia = date('d', strtotime($fecha));
		$dia = date('l', strtotime($fecha));
		$mes = date('F', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
		return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
	}

	// ********************************** CAMBIAR CORREO ***********************************
	static public function ctrCambiarCorreo()
	{
		if (isset($_POST['correoPerfil'])) {

			$datos = array(
				"correo" => $_POST['correoPerfil'],
				"idTripulante" => $_POST['id']
			);
			// var_dump($datos);

			$correo = ModeloTripulante::mdlCambiarCorreo($datos);

			if ($correo == "ok") {

				echo "<script>
							swal.fire({
								title: 'El Correo ha sido actualizado Correctamente',
								icon: 'success',
								confirmButtonText: 'Ok',
							}).then((result)=>{
									if(result.value){
										window.location = 'perfil'
								}
							})
						</script>";
			}
		}
	}


	// ********************************** CAMBIAR FECHA DE PROMOCIÓN***********************************
	static public function ctrCambiarPromocion()
	{
		if (isset($_POST['promocionPerfil'])) {

			$datos = array(
				"fecha_promocion" => $_POST['promocionPerfil'],
				"idTripulante" => $_POST['id']
			);
			// var_dump($datos);

			$promocion = ModeloTripulante::mdlCambiarpromocion($datos);

			if ($promocion == "ok") {

				echo "<script>
							swal.fire({
								title: 'La fecha de ascenso ha sido modificada Correctamente',
								icon: 'success',
								confirmButtonText: 'Ok',
							}).then((result)=>{
									if(result.value){
										window.location = 'perfil'
								}
							})
						</script>";
			}
		}
	}

	// ********************************** CAMBIAR FOTO DE PERFIL***********************************
	static public function ctrCambiarFoto()
	{
		if (isset($_POST['documentoPerfil'])) {

			$rutaPerfi = $_POST['fotoPerfilActual'];
			if (isset($_FILES['fotoPerfil']['tmp_name']) && !empty($_FILES['fotoPerfil']['tmp_name'])) {

				list($ancho, $alto) = getimagesize($_FILES['fotoPerfil']['tmp_name']);
				$nuevoAncho = 500;
				$nuevoAlto = 500;

				// CREAR CARPETA PARA ALMACENAR LA FOTO
				$directorio = "Views/img/img_tripulantes/" . $_POST['documentoPerfil'];

				//VALIDAR SI YA EXISTE LA FOTO PARA NO CREAR UN DIRECTORIO NUEVO CON LA MISMA FOTO
				if (!empty($_POST['fotoPerfilActual'])) {
					unlink($_POST['fotoPerfilActual']); //elimina la ruta de la foto 
				} else {
					mkdir($directorio, 0755);
				}

				// De acuerdo al tipo de imagen se aplican acciones por defecto de PHP
				if ($_FILES['fotoPerfil']['type'] == 'image/jpeg') {

					//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
					$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
					$rutaPerfi =  "Views/img/img_tripulantes/" . $_POST['documentoPerfil'] . "/" . $aleatorio . ".jpg";
					$origen = imagecreatefromjpeg($_FILES['fotoPerfil']['tmp_name']);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($origen, $rutaPerfi);
				}

				if ($_FILES['fotoPerfil']['type'] == 'image/png') {

					//GUARDAR IMAGEN EN UN NUEVO DIRECTORIO
					$aleatorio = mt_rand(100, 999); //Numero aleatorio para las fotos
					$rutaPerfi = "Views/img/img_tripulantes/" . $_POST['documentoPerfil'] . "/" . $aleatorio . ".png";
					$origen = imagecreatefrompng($_FILES['fotoPerfil']['tmp_name']);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($origen, $rutaPerfi);
				}
			}

			$datos = array(
				"foto" => $rutaPerfi,
				"idTripulante" => $_POST['id']
			);
			var_dump($datos);

			$foto = ModeloTripulante::mdlCambiarFoto($datos);

			if ($foto == "ok") {

				echo "<script>
							swal.fire({
								title: 'La imagen ha sido modificada Correctamente',
								icon: 'success',
								confirmButtonText: 'Ok',
							}).then((result)=>{
									if(result.value){
										window.location = 'perfil'
								}
							})
						</script>";
			}
		}
	}

	// ********************************** CAMBIAR CONTRASEÑA***********************************
	static public function ctrCambiarClave()
	{
		if (isset($_POST['documento'])) {

			if ($_POST['clavePerfil'] != "") {
				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['clavePerfil'])) {
					// ENCRIPTAR CONTRASEÑA
					$salt = md5($_POST['clavePerfil']);
					$pass = crypt($_POST['clavePerfil'], $salt);
				} else {
					echo "<script>
					swal.fire({
						title: 'Error!',
						text: 'La contraseña no debe tener caracteres especiales',
						icon: 'error',
						confirmButtonText: 'Ok',
						closeOnConfirm: false
					}).then((result)=>{
						if(result.value){
							window.location = 'tripulantes'
						}
					})
				</script>";
				}
			}

			$datos = array(
				"clave" => $pass,
				"idTripulante" => $_POST['id']
			);
			// var_dump($datos);

			$clave = ModeloTripulante::mdlCambiarClave($datos);

			if ($clave == "ok") {

				echo "<script>
						swal.fire({
							title: 'La Contraseña ha sido modificada Correctamente',
							icon: 'success',
							confirmButtonText: 'Ok',
						}).then((result)=>{
							if(result.value){
								window.location = 'perfil'
							}
						})
					</script>";
			}
		}
	}
}
