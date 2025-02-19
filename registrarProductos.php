<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location:login.html");
    exit();
} else if ($_SESSION['usuario_rol'] == 2) {
    header("location:indexUsuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Data analyzing" content="">
    <meta name="Expresagrafic" content="">

    <title>Herramientas Expresagrafic</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
   

</head>

<div id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-left" href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="img/logoADT.png" style="width:79%; height:fit-content;">
                </div>
                <div class="sidebar-brand-text mx-1"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Cotización -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cotización</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Cotización -->
            <li class="nav-item">
                <a class="nav-link" href="todo.php">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Por Hacer</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="anotaciones.php">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Anotaciones</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Nav Item - Administrar Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrar" aria-expanded="true" aria-controls="collapseAdministrar">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administrar Usuarios</span>
                </a>
                <div id="collapseAdministrar" class="collapse" aria-labelledby="headingAdministrar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Administrar:</h6>-->
                        <a class="collapse-item" href="privilegiosUsers.php">Dar privilegios</a>
                        <a class="collapse-item" href="userCount.php">Ver Usuarios</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrarEmpresa" aria-expanded="true" aria-controls="collapseAdministrarEmpresa">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administrar Empresa</span>
                </a>
                <div id="collapseAdministrarEmpresa" class="collapse" aria-labelledby="headingAdministrarEmpresa" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Administrar:</h6>-->
                        <a class="collapse-item" href="privilegiosUsers.php">Productos</a>
                        <a class="collapse-item" href="userCount.php">Sucursales</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reportes
            </div>

            <!-- Nav Item - Guardados Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGuardados" aria-expanded="true" aria-controls="collapseGuardados">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapseGuardados" class="collapse" aria-labelledby="headingGuardados" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Remisiones:</h6>
                        <a class="collapse-item" href="login.html">Cotizaciones</a>
                        <a class="collapse-item" href="register.html">Ventas Realizadas</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Cotización Proveedores:</h6>
                        <a class="collapse-item" href="404.php">Tabla precios provedores</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="gr.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Graficar</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tablas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <div class="d-none d-md-inline d-lg-inline" style="display:flex;justify-content:space-between;">
                        <h1>Registro de Productos</h1>
                    </div>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario_nombre'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="API/cerrar.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row justify-content-around mb-4">
                        <button id="ecp" class="btn btn-primary" onclick="ensenarCrearProducto()" disabled>Crear</button>
                        <button id="eep" class="btn btn-warning" onclick="ensenarEditarProducto()">Editar</button>
                    </div>
                    <div id="crearP">
                        <form action="subirProducto.php" method="post">
                            
                            <!-- Selects -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6 mb-2" style="display:flex;flex-direction:column;">
                                    <label id="labelCat" for="categoriaSelect" class="form-label">Categoria</label>
                                    <select class="form-select" id="categoriaSelect" name="categoriaSelect">
                                        
                                    </select>
                                    <label id="oLabelCat" for="categoria" class="form-label" style="display:none;">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria del producto" style="display:none;">
                                    <div>
                                        <label for="oC" class="form-label">Añadir nueva categoria</label>
                                        <input type="checkbox" id="oC" name="oC" onchange="mostrarInputCategoria()">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2" style="display:flex;flex-direction:column;">
                                    <label for="subcategoriaSelect" id="labelSubcategoria" class="form-label">Subcategoria</label>
                                    <select class="form-select" id="subcategoriaSelect" name="subcategoriaSelect">
                                        
                                    </select>
                                    <label for="subcategoria" id="labeloSub" class="form-label" style="display:none;">Subcategoría</label>
                                    <input type="text" class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria del producto" style="display:none;">
                                    <div>
                                        <label for="osC" class="form-label">Añadir nueva subcategoria</label>
                                        <input type="checkbox" id="osC" name="osC" onchange="mostrarInputSubCategoria()">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="precio" class="form-label">Precio Unitario</label>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio del producto" required>
                                </div>
                            </div>
                            <br>
                            <div class="text-center"><button class="btn btn-primary">Crear Producto</button></div>
                        </form>
                    </div>
                    <div class="row mt-4" id="editarP" style="display:none;">
                        <label for="busquedaProductoTabla">Buscar Producto: </label>
                        <input type="text" class="form-control" name="busquedaProductoTabla" id="busquedaProductoTabla" oninput="buscarEnLaTabla()">
                        <div class="table-responsive">
                            <table id="tablaProductos" class="table table-striped table-bordered display">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                        <th>Subcategoria</th>
                                        <th>Guardar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="productosEnTabla">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Expresagrafic 2024</span>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="API/cerrar.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>

    <script src="funcionesAdmin.js"></script>
    <script src="funcionesProductos.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all Guardados-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>