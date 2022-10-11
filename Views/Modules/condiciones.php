        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Condiciones de Vuelos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Condiciones de Vuelos</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <table class="table table-bordered table-striped tableData">
                                <thead>
                                    <tr>
                                        <th>Condición Vuelo</th>
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
                                    $condiciones = ControllerCondicion::ctrListarCondicion($item, $valor);


                                    foreach ($condiciones as $key => $value) {

                                        echo '<tr>
                                                <td>' . $value["nombreCondicion"] . '</td>
                                                <td>' . $value["abreCondicion_vuelo"] . '</td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-info btn-sm btnEditCondicion" data-toggle="modal" data-target="#modalEditCondicion" title="Editar" idCondicion="' . $value['idCondicion'] . '"><i class="fa fa-edit"></i></button>
                                                    </center>   
                                                </td>
                                        </tr>';
                                    } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-4 col-sm-12 mt-5">
                            <div class="card shadow">
                                <div class="card-header bg-dark font-weight-bold ">Agregar Condición de Vuelo</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-condiciones">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fab fa-cloudflare"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="newCondicion" placeholder="Condición de vuelo" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fab fa-cloudflare"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="newCodCondicion" placeholder="Código Condición de vuelo" required>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php  $condicion = ControllerCondicion::ctrCrearCondicion();?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- -------------------------------MODAL EDITAR CONDICIONES------------------------------ -->

        <div class="modal fade" id="modalEditCondicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Condición de Vuelo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fab fa-cloudflarei"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editCondicion" name="editCondicion" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-cloudflare"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editCodCondicion" name="editCodCondicion" required>
                                    </div>
                                </div>
                                <input type="hidden" id="editIdCondicion" name="editIdCondicion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>

                        <?php
                        $condicion = ControllerCondicion::ctrEditarCondicion();
                        ?>
                    </form>

                </div>
            </div>
        </div>