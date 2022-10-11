        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Cargos de Vuelos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Cargos de Vuelos</li>
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
                            <table class="table table-bordered table-striped display nowrap tableData"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Cargo Vuelo</th>
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
                                    $cargos = ControllerCargo::ctrListarCargo($item, $valor);
                                    

                                    foreach ($cargos as $key => $value) {

                                        echo '<tr>
                                                <td>' . $value["nombreCargo"] . '</td>
                                                <td>' . $value["abreCargo_vuelo"] . '</td>
                                                 <td>
                                                    <center>
                                                        <button class="btn btn-info btn-sm btnEditCargo" title="Editar" data-toggle="modal" data-target="#modalEditCargo" idCargo="' . $value['idCargo'] . '"><i class="fa fa-edit"></i></button>
                                                    </center>      
                                              </td>
                                        </tr>';
                                    } ?> 

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-4 col-sm-12 mt-5">
                            <div class="card shadow">
                                <div class="card-header bg-dark font-weight-bold ">Agregar Cargo de Vuelo</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-cargo">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-user-cog"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="newCargo" placeholder="Cargo de vuelo" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-user-cog"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="newCodCargo" placeholder="Código Cargo de vuelo" required>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php $cargo = ControllerCargo::ctrCrearCargo();?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

         <!-- -------------------------------MODAL EDITAR CONDICIONES------------------------------ -->

         <div class="modal fade" id="modalEditCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Cargo de Vuelo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-user-cog"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editCargo" name="editCargo" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" id="editCodCargo" name="editCodCargo" required>
                                    </div>
                                </div>
                                <input type="hidden" id="editIdCargo" name="editIdCargo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>

                        <?php
                         $cargo = ControllerCargo::ctrEditarCargo();
                        ?>
                    </form>

                </div>
            </div>
        </div>


