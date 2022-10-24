<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="vista/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-info">POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/dashboard.php','content-wrapper')">Escritorio</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/cartera.php','content-wrapper')">Cartera</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/caja.php','content-wrapper')">Control de Caja Menor</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/gastos.php','content-wrapper')">Gastos</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/ordenes.php','content-wrapper')">Ordenes de Trabajo</a>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/clientes.php','content-wrapper')">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/domicilios.php','content-wrapper')">Domicilios</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="cargarContenido('vista/proovedores.php','content-wrapper')">Proovedores</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Catalogos de Inventario
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/categorias.php','content-wrapper')">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/medidas.php','content-wrapper')">Unidades de Medida</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/Productos.php','content-wrapper')">Productos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Transacciones
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/categorias.php','content-wrapper')">Compras</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/medidas.php','content-wrapper')">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/gastos.php','content-wrapper')">Gastos</a>
                        </li>
                    </ul>
                </li>
                
                <!-- MENU -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Configuracion
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('vista/usuarios.php','content-wrapper')">
                                <i class="far fa-user nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- CERRAR SESION -->
                <li class="nav-item">
                    <a href="http://localhost/pos-app?cerrar_sesion=1" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Cerrar Sesion
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>