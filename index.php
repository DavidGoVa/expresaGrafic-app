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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>


</head>

<body id="page-top">

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
            <li class="nav-item active">
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



                    <h1>Cotización</h1>



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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div>
                           <div>
                           <input type="text" id="CNR" placeholder="Ingrese el texto">
                           <select id="CR">
                                    <option value="opcion1">Opción 1</option>
                                    <option value="opcion2">Opción 2</option>
                                    <option value="opcion3">Opción 3</option>
                           </select>
                           <select id="E">
                                    <option value="opcion1">Otra Opción 1</option>
                                    <option value="opcion2">Otra Opción 2</option>
                                    <option value="opcion3">Otra Opción 3</option>
                           </select>
                           </div>
                           
                           <div></div>

                           <input type="radio" id="opcionTexto" name="busqueda" value="cnr" onchange="mostrarOpcion()" checked>
                            <label for="opcionTexto">Búsqueda por texto</label><br>

                            <input type="radio" id="opcionSelect" name="busqueda" value="cr" onchange="mostrarOpcion()">
                            <label for="opcionSelect">Búsqueda por selección</label><br>

                            <input type="radio" id="opcionOpciones" name="busqueda" value="e" onchange="mostrarOpcion()">
                            <label for="opcionOpciones">Búsqueda por 3 opciones</label><br>

                           

                            <!-- Radio buttons con 3 opciones -->
                            <div id="divOpciones" class="hidden">
                                <input type="radio" id="opcion1" name="opcionBusqueda" value="opcion1">
                                <label for="opcion1">Opción 1</label><br>

                                <input type="radio" id="opcion2" name="opcionBusqueda" value="opcion2">
                                <label for="opcion2">Opción 2</label><br>

                                <input type="radio" id="opcion3" name="opcionBusqueda" value="opcion3">
                                <label for="opcion3">Opción 3</label><br>
                            </div>


                        </div>

                        <a onclick="generarPDF()" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generar PDF</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="invoice-container">
                            <h1>Invoice Maker</h1>
                            <div class="invoice-header">
                                <div>
                                    <h2>Información del Cliente</h2>
                                    <input type="text" id="clientName" placeholder="Nombre del Cliente">
                                    <input type="text" id="clientAddress" placeholder="Dirección del Cliente">
                                </div>
                                <div>
                                    <h2>Detalles de la Factura</h2>
                                    <input type="text" id="invoiceNumber" placeholder="Número de Factura">
                                    <input type="date" id="invoiceDate">
                                </div>
                            </div>

                            <table id="invoiceTable">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se agregarán las filas dinámicamente -->
                                </tbody>
                            </table>

                            <button class="add-item">Agregar Ítem</button>

                            <div class="total">
                                <h2>Total: $<span id="totalAmount">0.00</span></h2>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; ADT 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
    <script src="funcionesAdmin.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all Guardados-->
    <script src="js/sb-admin-2.min.js"></script>




</body>

</html>