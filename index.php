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
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrarEmpresa" aria-expanded="true" aria-controls="collapseAdministrarEmpresa">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administrar Empresa</span>
                </a>
                <div id="collapseAdministrarEmpresa" class="collapse" aria-labelledby="headingAdministrarEmpresa" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Administrar:</h6>-->
                        <a class="collapse-item" href="productosLista.php">Productos</a>
                        <a class="collapse-item" href="registrarProductos.php">Añadir Productos</a>
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


                    <div style="display:flex;justify-content:space-between;">
                    <h1>Cotización</h1>
                    <input type="hidden" step="0.01" id="subtotal">
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

                    <!-- Page Heading -->
                    <div class="col-12 col-md-12 col-sm-12 d-flex mb-4 justify-content-between">
                        <div class="col-4 col-md-4 col-sm-4">
                            <div id="divCNR" style="display:flex; flex-direction:column;">
                                <label for="clienteNoRegistrado">Cliente no Registrado</label>
                                <input type="text" name="clienteNoRegistrado" id="CNR" placeholder="Nombre del cliente">
                            </div>

                            <div id="divCR" style="display:none; flex-direction:column;">
                                <label for="clienteRegistrado">Cliente Registrado</label>
                                <select id="CR" name="clienteRegistrado" onchange="cargarDatosClientes()">
                                    
                                </select>
                            </div>

                            <div id="divE" style="display:none; flex-direction:column;">
                                <label for="empresa">Cliente Empresa:</label>
                                <select name="empresa" id="E" onchange="cargarDatosClientes()">
                                  
                                </select>
                            </div>
                            <input type="hidden" id="rfc">
                            <input type="hidden" id="domicilio">
                            <input type="hidden" id="telefono">
                            <input type="hidden" id="mail">
                            <input type="hidden" id="regimen">
                        </div>

                        <div class="col-2 col-md-2 col-sm-4" style="display:flex; flex-direction:column; max-width:30%">
                            <label for="opcionCliente">Cliente tipo:</label>
                            <select name="opcionCliente" id="opcionCliente" onchange="mostrarOpcion()">
                                <option value="CNR">Sin Registro</option>
                                <option value="CR">Con Registro</option>
                                <option value="E">Empresarial</option>
                            </select>
                        </div>

                        <div class="col-2 col-md-2 col-sm-4" style="display:flex; flex-direction:column; max-width:30%">
                            <label for="fechaEntrega">Fecha Entrega:</label>
                            <input type="date" name="fechaEntrega" id="fechaEntrega">
                        </div>

                        <div class="col-1 col-md-1 d-none d-md-block text-center">
                            <a onclick="generarPDF()" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generar PDF</a>
                        </div>

                    </div>

                    <hr class="sidebar-divider mb-4 my-0">

                    <div class="col-12 mb-4" style="display:flex;flex-direction:row;justify-content:space-around;align-items:center">
                        
                            <div>
                                <label for="PNR">Producto sin registro</label>
                                <input name="tipoprod" id="PNR" type="radio" value="PNR" checked onchange="mostrarProd('PNR')">
                            </div>

                            <div>
                                <label for="PR">Producto Registrado</label>
                                <input name="tipoprod" id="PR" type="radio" value="PR" onchange="mostrarProd('PR')">
                            </div>

                            <div>
                                <label for="PB">Buscar Producto</label>
                                <input name="tipoprod" id="PB" type="radio" value="PB" onchange="mostrarProd('PB')">
                            </div>

                            <div class="col-1 text-center">
                                <a onclick="agregarProducto()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Añadir</a>
                            </div>

                            <div class="col-1 text-center">
                                <a onclick="eliminarFila()" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-minus fa-sm text-white-50"></i>Eliminar</a>
                            </div>
                        
                    </div>

                    <div class="col-12 col-md-12 col-sm-12 mb-4 justify-content-between align-items-center" id="divdivC" style="display:none;">
                    <div class="row col-12" id="divCategorias">
                        <div class="col-4" id="productoCategoria" style="flex-direction:column;">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" id="categoria" onchange="cargarSubcategorias()">

                            </select>
                        </div>
                        <div class="col-4" id="productoSubcategoria" style="flex-direction:column;">
                            <label for="subcategoria">Subcategoria:</label>
                            <select name="subcategoria" id="subcategoria" onchange="cargarNombreProductos()">

                            </select>
                        </div>
                        <div class="col-4" id="productoNombre" style="flex-direction:column;">
                            <label for="nombre">Nombre:</label>
                            <select name="nombre" id="nombre" onchange="precioProd()">

                            </select>
                        </div>
                        </div>        
                </div>
                    <div class="col-12 col-md-12 col-sm-12 mb-4 d-flex justify-content-between align-items-center">

                        <div class="col-6" id="productoLibre" style="display:flex; flex-direction:column;">
                            <label for="textProductoLibre">Escribe el Producto:</label>
                            <input type="text" id="textProductoLibre">
                        </div>                        

                        <div class="col-3" id="busquedaNombre" style="display:none; flex-direction:column;">
                            <label for="busquedaName">Pon una palabra clave:</label>
                            <input type="text" id="busquedaName" oninput="buscarProducto()">
                        </div>
                        
                        <div class="col-3" id="prodsBusqueda" style="display:none; flex-direction:column;">
                            <label for="prodsEnc">Productos Encontrados:</label>
                            <select id="prodsEnc">

                            </select>
                        </div>

                        <div class="col-3" id="precioInput" style="display:flex; flex-direction:column;">
                            <label for="precio">Precio:</label>
                            <input type="number" step="0.01" id="precio">
                        </div>

                        <div class="col-3" style="display:flex; flex-direction:column;">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" step="0.01">
                        </div>



                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <table id="tablaCotizacion" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 justify-content-between">
                        <a onclick="generarPDF()" class=" d-md-none d-lg-none btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generar PDF</a>
                        
                                <a onclick="agregarProducto()" class="d-md-none d-lg-none btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Añadir</a>
                            
                                <a onclick="eliminarFila()" class="d-md-none d-lg-none btn btn-sm btn-warning shadow-sm"><i class="fas fa-minus fa-sm text-white-50"></i>Eliminar</a>
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
                <span>Copyright &copy; Expresagrafic 2024</span>
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