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
    <meta name="David" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!--
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <py-env>
        - numpy
        - plotly
    </py-env>-->

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Por Hacer</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
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
                    <span>Guardados</span>
                </a>
                <div id="collapseGuardados" class="collapse" aria-labelledby="headingGuardados" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Guardados:</h6>
                        <a class="collapse-item" href="404.php">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



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
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="API/cerrar.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center  mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista por hacer</h1>
                   
                        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  ml-4" href="#" id="workDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                               Nueva Tarea
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="workDropdown" data-bs-auto-close="outside">
                            <form id="taskForm" method="post">
            <a class="dropdown-item">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                Título <input type="text" name="tituloTarea" required>
            </a>
            <a class="dropdown-item">
                <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                Descripción <input type="text" name="descripcionTarea" required>
            </a>
            <a class="dropdown-item">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Prioridad 
                <select name="prioridad" id="prioridad">
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
            </a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item">
                <input type="submit" value="Crear" class="btn btn-primary">
            </div>
        </form>    
                           
                            </div>
                    
                            <div id="alert-box" style="display: none; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; padding: 10px 20px; border-radius: 5px; font-size: 16px;">
    <!-- Mensaje de alerta aquí -->
</div>
                    
                    
                    </div>

                    <!-- Content Row -->
                    <div class="row" id="tareas">

                   

                    

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

   
    <!-- End of Content Wrapper -->

    
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all Guardados-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="funcionesTareas.js"></script>
    <script>
    // Evitar que el dropdown se cierre al interactuar con el select
    document.querySelector('.dropdown-menu select').addEventListener('click', function(e) {
        e.stopPropagation();
    });

    
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#taskForm').on('submit', function(e) {
            e.preventDefault(); // Prevenir el envío tradicional del formulario
            
            $.ajax({
                url: 'nuevaTarea.php', // Archivo PHP que maneja la inserción
                type: 'POST',
                data: $(this).serialize(), // Serializa los datos del formulario
                success: function(response) {
                    var alertBox = $('#alert-box');
                    alertBox.text('Tarea creada exitosamente').css({
                        'background-color': '#28a745', // Verde
                        'display': 'block',
                        'color': 'white'
                    }).fadeIn().delay(3000).fadeOut();
                    
                    // Limpiar el formulario
                    $('#taskForm')[0].reset();
                    
                    // Recargar la página después de 3.5 segundos
                    setTimeout(function() {
                        location.reload();
                    }, 800);
                },
                error: function() {
                    var alertBox = $('#alert-box');
                    alertBox.text('Error en el sistema, no se pudo crear la tarea').css({
                        'background-color': '#dc3545', // Rojo
                        'display': 'block',
                        'color': 'white'
                    }).fadeIn().delay(3000).fadeOut();
                }
            });
        });
    });
</script>


</body>

</html>