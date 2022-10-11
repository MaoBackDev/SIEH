<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeTrip">SIEH</a></li>
                        <li class="breadcrumb-item active">Registro Vuelos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-sm-12">
                <div class="card border-secondary mb-3 shadow">
                    <div class="card-header bg-dark">
                        Registro de Vuelo
                    </div>

                    <form method="post" id="form-vuelos">
                        <div class="card-body text-secondary">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                            </div>
                                            <input class="form-control input-lg" type="text" name="newOrden" required placeholder="Orden de Vuelo">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-helicopter"></i></span>
                                        </div>
                                        <select name="newAeronave" class="form-control input-group-lg custom-select">
                                            <option value="">Seleccione Matrícula Aeronave</option>

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

                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="date" name="newFecha" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <select name="newMision" class="form-control input-group-lg custom-select">
                                            <option value="">Seleccione la Misión</option>

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

                            <div class="form-group row">
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-astronaut"></i></span>
                                        </div>
                                        <input value="<?php echo $_SESSION['grado'] . '  ' . $_SESSION['nombres'] ?>" class="form-control input-lg" type="text" name="newTrip" required readonly>
                                        <input type="hidden" name="newIdTripulante" value="<?php echo $_SESSION['id'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-cloudflare"></i></span>
                                        </div>
                                        <select name="newCondicion" class="form-control input-group-lg custom-select">
                                            <option value="">Seleccione la Condición de Vuelo</option>

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
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Hora Inicial</span>
                                        </div>
                                        <input class="form-control input-lg" type="time" name="newFechaInicio" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Hora final</span>
                                        </div>
                                        <input class="form-control input-lg" type="time" name="newFechaFin" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                        </div>
                                        <select name="newCargo" class="form-control input-group-lg custom-select">
                                            <option value="">Seleccione el Cargo de Vuelo</option>

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
                                    <input value="" class="form-control input-lg" type="hidden" step="any" min="0" name="newCantidad">
                                </div>

                                <div class="col-md-6 form-group">
                                    <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones" style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-end w-100">
                                <button id="saveVuelo" type="submit" class="btn btn-primary btn-md">Guardar</button>
                            </div>
                        </div>
                        <?php
                        $registroVuelo = ControllerVuelo::ctrCrearVuelo();
                        ?>
                    </form>
                </div>
            </div>
    </section>
</div>