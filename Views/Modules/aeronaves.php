        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Aeronaves</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Aeronaves</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">

                            <table class="table table-bordered table-striped display nowrap tableData td-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Matrícula</th>
                                        <th>Tipo Aeronave</th>
                                        <th style="width: 100px">Estado</th>
                                        <th style="width: 8px">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // creamos variables y le agregamos el valor null para traer todos los registros
                                    $item = null;
                                    $valor = null;

                                    // instanciamos un obleto desde el controlados y ejecutamos el método Listar condicion
                                    $aeronaves = ControllerAeronave::ctrListarAeronave($item, $valor);


                                    foreach ($aeronaves as $key => $value) {

                                        echo '<tr>
                                                <td>' . $value["matricula"] . '</td>
                                                <td>' . $value["tipoAeronave"] . '</td>';
                                        if ($value["estado"] == 'Disponible') {
                                            echo '<td class="text-success font-weight-bolder">' . $value["estado"] . '</td>';
                                        } else {
                                            echo '<td class="text-danger font-weight-bolder">' . $value["estado"] . '</td>';
                                        }

                                        echo  '<td>
                                                    <center>
                                                        <button class="btn btn-info btn-sm btnEditAeronave" data-toggle="modal" data-target="#modalEditAeronave" title="Editar" idAeronave="' . $value['idAeronave'] . '"><i class="fa fa-edit"></i></button>
                                                    </center>
                                                </td>
                                            </tr>';
                                    } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-4 col-sm-12 mt-5">
                            <div class="card shadow">
                                <div class="card-header bg-dark font-weight-bold ">Agregar Aeronave</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-aeronaves">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-helicopter"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="newMatricula" placeholder="Matrícula Aeronave" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fas fa-helicopter"></i></span>
                                                </div>
                                                <select name="tipoAeronave" class="form-control input-lg custom-select" required>
                                                    <option value="">Seleccione un tipo de aeronave</option>
                                                    <option value="UH-N1">UH-N1</option>
                                                    <option value="UH-60">UH-60</option>
                                                    <option value="UH-1HII">UH-1HII</option>
                                                    <option value="MI-17">MI-17</option>
                                                    <option value="CASA-212">CASA-212</option>
                                                    <option value="ANTONOV">ANTONOV</option>
                                                    <option value="CESSNA-206">CESSNA-206</option>
                                                    <option value="CARAVAN">CARAVAN</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php $aeronave = ControllerAeronave::ctrCrearaeronave(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>


        <!-- -------------------------------MODAL EDITAR AERONAVES------------------------------ -->

        <div class="modal fade" id="modalEditAeronave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Aeronaves</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-helicopter"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editMatricula" name="editMatricula" required readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fas fa-helicopter"></i></span>
                                        </div>
                                        <select name="editTipoAeronave" class="form-control input-lg custom-select" required readonly>
                                            <option value="" id="editTipoAeronave"></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fas fa-helicopter"></i></span>
                                        </div>
                                        <select name="editEstadoAeronave" class="form-control input-lg custom-select">
                                            <option value="" id="editEstadoAeronave"></option>
                                            <option value="Disponible">Disponible</option>
                                            <option value="No Disponible">No Disponible</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="editIdAeronave" name="editIdAeronave">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>

                        <?php
                        $aeronave = ControllerAeronave::ctrEditarAeronave();
                        ?>
                    </form>

                </div>
            </div>
        </div>