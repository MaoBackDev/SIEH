        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Panel de Control Categorías</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                                <li class="breadcrumb-item active">Categorías</li>
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

                            <table class="table table-bordered table-striped display nowrp tableData td-responsive"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Categoría</th>
                                        <th>Código</th>
                                        <th style="width: 8px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $categorias = ControllerCategoria::ctrListarCategorias($item, $valor);

                                    foreach ($categorias as $key => $value) {

                                        echo '<tr>
                                                <td>' . $value["nombreCategoria"] . '</td>
                                                <td>' . $value["abrCategoria"] . '</td>
                                                <td
                                                    <center>
                                                        <button class="btn btn-info btn-sm btnEditCategoria" data-toggle="modal" data-target="#modalEditCategoria" title="Editar" categoriaId="' . $value['idCategoria'] . '"><i class="fa fa-edit"></i></button>
                                                    </center>                                                   
                                                </td>
                                        
                                        </tr>';
                                    } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-4 col-sm-12 mt-5">
                            <div class="card shadow">
                                <div class="card-header bg-dark font-weight-bold ">Agregar Categoría</div>
                                <div class="card-body text-primary">
                                    <form method="POST" id="form-categoria">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-th"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="categoria" placeholder="Ingresa Nombre de la Categoría" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="nav-icon fas fa-th"></i></span>
                                                </div>
                                                <input class="form-control input-lg" type="text" name="codigo" placeholder="Ingresa Código de Categoría" required>
                                            </div>
                                        </div>

                                        <div class="form-group w-100">
                                            <button type="submit" class="btn btn-outline-dark btn-block p-2 ">Guardar</button>
                                        </div>

                                        <?php $mision = ControllerCategoria::ctrCrearCategoria(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- -------------------------------MODAL EDITAR CATEGORÍAS------------------------------ -->
        <div class="modal fade" id="modalEditCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST">
                        <div class="modal-header" style="background: #3c8dbc; color: #fff">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-th"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" name="editCategoria" id="editNameCategoria" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-th"></i></span>
                                        </div>
                                        <input class="form-control input-lg" type="text" name="editCodigo" id="editCodigoCategoria" required>
                                        <input type="hidden" id="idEditCategoria" name="idEditCategoria">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                    <?php
                    $categoria = ControllerCategoria::ctrEditarCategoria();
                    ?>
                </div>
            </div>
        </div>