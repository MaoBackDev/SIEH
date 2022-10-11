        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Misiones</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Misiones</li>
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
                            <table class="table table-bordered table-striped shadow td-responsive display nowrap tableData cellspacing=" 0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Misión</th>
                                        <th>Código</th>
                                        <th style="width: 8px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // creamos variables y le agregamos el valor null para traer todos los registros
                                    $item = null;
                                    $valor = null;

                                    // instanciamos un obleto desde el controlados y ejecutamos el método Listar condicion
                                    $aeronaves = ControllerMisiones::ctrListarMisiones($item, $valor);
                                    foreach ($aeronaves as $key => $value) {

                                        echo '<tr>
                                                <td>' . $value["tipo_mision"] . '</td>
                                                <td>' . $value["codigo"] . '</td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-info btn-sm btnEditMision" data-toggle="modal" data-target="#modalEditMision" title="Editar" idMision="' . $value['idMision'] .'">
                                                            <i class="fa fa-edit"></i>
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
                                <div class="card-header bg-dark font-weight-bold ">Agregar Misión</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-misiones">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-map-marked-alt"></i></span>
                                                </div>
                                                <input class="form-control input-lg p-4" type="text" name="newMision" placeholder="Nombre Misión" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-map-marked-alt"></i></span>
                                                </div>
                                                <input class="form-control input-lg p-4" type="text" name="newCodMision" placeholder="Codigo Misión" required>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php $mision = ControllerMisiones::ctrCrearMision(); ?>
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

        <!-- -------------------------------MODAL EDITAR MISIONES------------------------------ -->

        <div class="modal fade" id="modalEditMision" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Misión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editMision" name="editMision" placeholder="Nombre Misión" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editCodMision" name="editCodMision" placeholder="Codigo Misión" required>
                                    </div>
                                </div>
                                <input type="hidden" id="editIdMision" name="editIdMision">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                        <?php
                        $mision = ControllerMisiones::ctrEditarMisiones();
                        ?>
                    </form>

                </div>
            </div>
        </div>

        <!-- <div class="box-header with-border">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddMision">Agregar Mision</button>
                    </div> -->