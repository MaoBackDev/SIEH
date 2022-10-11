<?php

class ControllerGrado{

    // Listar Grados
    static public function ctrListarGrados($item, $valor){

        $tabla = "grado";
        $respuesta = ModeloGrado::mdlMostrarDatos($tabla, $item, $valor);
        return $respuesta;

    }

    // Agregar grados
    static public function ctrCrearGrado(){
		if (isset($_POST['newGrado'])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['newGrado']) && 
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['newAbreGrado']))
            {
                $tabla = 'grado';
                $datos = array("nombreGrado"=> $_POST['newGrado'],
                                "abreGrado"=> $_POST['newAbreGrado']
                              );
                $respuesta = ModeloGrado::mdlCrearGrado($tabla,$datos);
				
				if ($respuesta == 'error') {

					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error!</strong> El grado no está disponible. Por favor Ingrese otro grado!
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
								title: 'Bien Hecho',
								text: 'Registro exitoso',
								icon: 'success',
								confirmButtonText: 'Ok',
								closeOnConfirm: false
							}).then((result)=>{
									if(result.value){
										window.location = 'grados'
									}
								})
						</script>";
				}

			}else{

				echo "<script>
						swal.fire({
							title: 'Oops! Error',
							text: 'No puedes ingresar caracteres especiales en los campos',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'grados'
							}
						})
					</script>";

			
		    }
        }
 
    }

	// -------------------------------------------EDITAR GRADO---------------------------------
    static public function ctrEditarGrado(){
		
		if (isset($_POST['grado'])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['grado']) && 
				preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['abreGrado']))
            {
                $tabla = 'grado';
                $datos = array("nombreGrado"=> $_POST['grado'],
                                "abreGrado"=> $_POST['abreGrado'],
								"idGrado" => $_POST['idGrado']
                              );
                $respuesta = ModeloGrado::mdlEditarGrado($tabla,$datos);

                if ($respuesta == "ok") {
					echo "<script>
							swal.fire({
								title: 'El registro ha sido actualizado correctamente',
								icon: 'success',
								confirmButtonText: 'Ok',
							}).then((result)=>{
									if(result.value){
										window.location = 'grados'
									}
								})
						</script>";
				}
				

			}else{

				echo "<script>
						swal.fire({
							title: 'No puedes ingresar caracteres especiales en los campos',
							icon: 'error',
							confirmButtonText: 'Ok',
							closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = 'grados'
							}
						})
					</script>";

			
		    }
        }
	}
}