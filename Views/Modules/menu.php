<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="views/img/SIEH.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIEH BAAV-4</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                if ($_SESSION['rol'] == 'Administrador') {

                    echo ' <li class="nav-item">
                <a href="home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Tablero Principal
                    </p>
                </a>
            </li>

            <li class="nav-item active">
                <a href="tripulantes" class="nav-link">
                    <i class="nav-icon fas fa-user-astronaut"></i>
                    <p>
                        Tripulantes
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="categorias" class="nav-link"">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Categorías
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="misiones" class="nav-link"">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>
                        Misiones
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="grados" class="nav-link">
                    <i class="nav-icon fas fa-angle-double-up"></i>
                    <p>
                        Grados
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="cargos" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Cargos de Vuelo
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="condiciones" class="nav-link">
                    <i class="nav-icon fab fa-cloudflare"></i>
                    <p>
                        Condiciones de Vuelo
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="aeronaves" class="nav-link">
                    <i class="nav-icon fas fa-helicopter"></i>
                    <p>
                        Aeronaves
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-fighter-jet"></i>
                    <p>
                        Vuelos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="vuelos" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Administrar vuelos</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="homeTrip" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Panel Tripulantes</p>
                        </a>
                    </li>
                </ul>
            </li>';
                } else if ($_SESSION['rol'] == 'Usuario') {

                    echo ' <li class="nav-item">
                            <a href="homeTrip" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Panel Tripulantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="registroVuelos" class="nav-link">
                                <i class="nav-icon fas fa-location-arrow"></i>
                                <p>Registrar Vuelos</p>
                            </a>
                        </li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</aside>