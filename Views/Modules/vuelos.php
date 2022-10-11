        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Administrar Vuelos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Vuelos</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="mb-3">
                        <a href="reportes" class="btn btn-outline-dark font-weight-bold">Generar Reportes</a>
                        <a href="registroVuelos" class="btn btn-outline-success font-weight-bold">Registrar Vuelos</a>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <table id="tablaVuelo" class="table table-bordered table-striped display nowrap td-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>No. Orden</th>
                                        <th>Aeronave</th>
                                        <th>Tripulante</th>
                                        <th>Misión</th>
                                        <th>Condición</th>
                                        <th>Cargo</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Duración</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- **************************** MODAL EDITAR VUELO ***************************** -->

        <div class="modal fade" id="modalEditVuelo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Vuelo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body text-secondary">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" id="editOrden" name="editOrden" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-helicopter"></i></span>
                                            </div>
                                            <select name="editAeronave" class="form-control input-group-lg custom-select" required>
                                                <option id="editAeronave"></option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $aeronaves = ControllerAeronave::ctrListarAeronave($item, $valor);

                                                // LISTAR LAS MATRÍCULAS SE LAS AERONAVES DISPONIBLES
                                                foreach ($aeronaves as $key => $value) {
                                                    if ($value['estado'] == 'No Disponible') {
                                                        echo '';
                                                    } else {
                                                        echo '<option value="' . $value['idAeronave'] . '">' . $value['matricula'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Fecha</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" id="editFecha" name="editFecha" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                                </div>
                                                <select name="editMision" class="form-control input-group-lg custom-select">
                                                    <option id="editMision"></option>

                                                    <?php
                                                    $item = null;
                                                    $valor = null;
                                                    $misiones = ControllerMisiones::ctrListarMisiones($item, $valor);

                                                    foreach ($misiones as $key => $value) {
                                                        echo '<option value="' . $value['idMision'] . '">' . $value['tipo_mision'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-astronaut"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" id="editTrip" name="editTrip" readonly>
                                                <input type="hidden" id="editTripValue" name="editTripValue">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-cloudflare"></i></span>
                                            </div>
                                            <select name="editCondicion" class="form-control input-group-lg custom-select">
                                                <option id="editCondicion"></option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $condiciones = ControllerCondicion::ctrListarCondicion($item, $valor);

                                                foreach ($condiciones as $key => $value) {
                                                    echo '<option value="' . $value['idCondicion'] . '">' . $value['nombreCondicion'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Hora Inicial</span>
                                                </div>
                                                <input class="form-control input-lg" type="time" id="editHoraInicio" name="editHoraInicio">
                                                <input type="hidden" id="horaInicioActual" name="horaInicioActual">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Hora final</span>
                                            </div>
                                            <input class="form-control input-lg" type="time" id="editHoraFin" name="editHoraFin">
                                            <input type="hidden" id="horaFinActual" name="horaFinActual">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 form-group">
                                            <textarea id="editObservaciones" name="editObservaciones" class="form-control" placeholder="Observaciones" style="height: 100px"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                            </div>
                                            <select name="editCargo" class="form-control input-group-lg custom-select">
                                                <option id="editCargo"></option>

                                                <?php
                                                $item = null;
                                                $valor = null;
                                                $cargos = ControllerCargo::ctrListarCargo($item, $valor);

                                                foreach ($cargos as $key => $value) {
                                                    echo '<option value="' . $value['idCargo'] . '">' . $value['nombreCargo'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" step="any" min="0" id="cantidadActual" name="cantidadActual">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-end w-100">
                                <button type="button" class="btn btn-secondary d-block mr-2" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                    <?php $vuelos = ControllerVuelo::ctrEditarVuelo(); ?>
                </div>
            </div>
        </div>