        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Grados</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Grados</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-bordered table-striped display nowrap tableData td-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Grado</th>
                                        <th>Abreviatura</th>
                                        <th style="width: 80px">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $grados = ControllerGrado::ctrListarGrados($item, $valor);

                                    foreach ($grados as $grado) {
                                        echo '<tr>
                                            <td>' . $grado["nombreGrado"] . '</td>
                                            <td>' . $grado["abreGrado"] . '</td>                                  
                                            <td>
                                                <center>
                                                    <button class="btn btn-info btnEditGrado" data-toggle="modal" data-target="#modalEditGrado" title="Editar" idGrado="' . $grado['idGrado'] . '">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </center>
                                                
                                            </td>
                                        </tr>';
                                    } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-4 col-sm-12 mt-5">
                            <div class="card shadow">
                                <div class="card-header bg-dark font-weight-bold ">Agregar Grado</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-grado">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-angle-double-up"></i></span>
                                                </div>
                                                <input class="form-control input-lg p-4" type="text" name="newGrado" placeholder="Nombre Grado" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-angle-double-up"></i></span>
                                                </div>
                                                <input class="form-control input-lg p-4" type="text" name="newAbreGrado" placeholder="Codigo Grado" required>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php $mision = ControllerGrado::ctrCrearGrado(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>



        <!-- ***************************** MODAL EDITAR GRADO ********************************** -->

        <div class="modal fade" id="modalEditGrado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Grado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-angle-double-up"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" name="grado" id="grado" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-angle-double-up"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" name="abreGrado" id="abrGrado" required>
                                        <input type="hidden" id="idEditGrado" name="idGrado">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    <?php
                    $Editgrado = ControllerGrado::ctrEditarGrado();
                    ?>
                </div>
            </div>
        </div>