        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Tripulantes</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Tripulantes</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="mb-3">
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modalAddTripulante">Agregar Tripulante</button>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">

                            <table id="tableTripulantes" class="table table-bordered table-striped display nowrap td-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Grado</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>
                                        <th>Documento</th>
                                        <th>Estado</th>
                                        <th>Nacimiento</th>
                                        <th>Promoción</th>
                                        <th>Cer. Médico</th>
                                        <th>Cod. Militar</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>

                                </tbody> -->

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- **************************** MODAL CREAR TRIPULANTE ***************************** -->

        <div class="modal fade" id="modalAddTripulante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- FORMULARIO -->
                    <form id="form-tripulantes" method="POST" enctype="multipart/form-data">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Tripulante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input id="nuevoTrip" class="form-control input-lg" type="text" name="documento" placeholder="Documento" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="codigo_militar" placeholder="Código Militar" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-spell-check"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="apellidos" placeholder="Apellidos" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-spell-check"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="nombres" placeholder="Nombres" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="email" name="correo" placeholder="Correo Electrónico" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="password" name="clave" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nacimiento</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="fecha_nacimiento" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Promoción</span>
                                                </div>
                                                <input class="form-control input-lg" type="date" name="fecha_promocion" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Cer. Médico</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="certificado_medico" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="rol" class="form-control input-lg custom-select">
                                                    <option value="">Seleccione un Rol</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Usuario">Usuario</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-th"></i></span>
                                            </div>
                                            <select name="categoria" class="form-control input-group-lg custom-select">
                                                <option value="">Seleccione Categoría</option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $categorias = ControllerCategoria::ctrListarCategorias($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="' . $value['idCategoria'] . '">' . $value['nombreCategoria'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-angle-double-up"></i></span>
                                            </div>
                                            <select name="grado" class="form-control input-lg custom-select">
                                                <option value="">Seleccione Grado</option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $categorias = ControllerGrado::ctrListarGrados($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="' . $value['idGrado'] . '">' . $value['nombreGrado'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <div class="panel">SUBIR FOTO</div>
                                        <input type="file" class="foto" name="foto">
                                        <p class="help-block">Peso máximo 2 MB</p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="Views/img/avatar-pilot.png" class="img-thumbnail visualizar" width="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-start w-100">
                                <button type="button" class="btn btn-secondary d-block mr-2" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </div>
                    </form>
                    <?php
                    $tripulantes = ControladorTripulante::ctrCrearTripulante();
                    ?>
                </div>
            </div>
        </div>

        <!-- **************************** MODAL EDITAR TRIPULANTE ***************************** -->

        <div class="modal fade" id="modalEditTrip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- FORMULARIO -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Tripulante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="editDocumento" id="documento" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="edit_codigo_militar" id="codigo_militar" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-spell-check"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="editApellidos" id="apellidos" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-spell-check"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="editNombres" id="nombres" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="email" name="editCorreo" id="correo" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="password" name="editClave" id="clave" placeholder="Ingrese la nueva contraseña">
                                            <input type="hidden" id="claveActual" name="claveActual">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nacimiento</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="edit_fecha_nacimiento" id="fecha_nacimiento" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Promoción</span>
                                                </div>
                                                <input class="form-control input-lg" type="date" name="edit_fecha_promocion" id="fecha_promocion" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Cer. Médico</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="edit_certificado_medico" id="certificado_medico" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="editRol" class="form-control input-lg custom-select">
                                                    <option value="" id="editRol"></option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Usuario">Usuario</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="estado" id="estado">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-th"></i></span>
                                            </div>
                                            <select name="editCategoria" class="form-control input-group-lg custom-select">
                                                <option id="editCategoria"></option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $categorias = ControllerCategoria::ctrListarCategorias($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="' . $value['idCategoria'] . '">' . $value['nombreCategoria'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-angle-double-up"></i></span>
                                            </div>
                                            <select name="editGrado" class="form-control input-lg custom-select">
                                                <option id="editGrado"></option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $categorias = ControllerGrado::ctrListarGrados($item, $valor);

                                                foreach ($categorias as $key => $value) {
                                                    echo '<option value="' . $value['idGrado'] . '">' . $value['nombreGrado'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <div class="panel">SUBIR FOTO</div>
                                        <input type="file" class="foto" name="editarFoto">
                                        <p class="help-block">Peso máximo 2 MB</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="Views/img/avatar-pilot.png" class="img-thumbnail visualizar" width="100px">
                                        <input type="hidden" id="fotoActual" name="fotoActual">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-start w-100">
                                <button type="button" class="btn btn-secondary d-block mr-2" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>

                        </div>
                    </form>
                    <?php $tripulantes = ControladorTripulante::ctrEditarTripulante(); ?>
                </div>
            </div>
        </div>