<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        // Redirigir al usuario al login
        header('Location: ../../public/login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Productos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../public/imgs/login.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../public/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../../public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="sidebar-collapse sidebar-mini">

<?php include "../../public/includes/config.php"; ?>

<div class="wrapper">
    <nav class="main-header navbar navbar-expand">
<?php 
        include "../../public/includes/header.php";
?>
    </nav>

    <aside class="main-sidebar elevation-4">
<?php 
        include "../../public/includes/lateralaside.php";
?>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="background-color: white; padding: 10px; border-radius: 10px;">
                    <div class="col-sm-6">
                        <h5>¡Bienvenido! <?php echo $_SESSION['name']; ?></h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="index.php">Inicio</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="content" style="margin-left: 10px;">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title" style="color: red;">Crear Reporte</h6>
                        </div>
                        <div class="card-body">
                            <form action="../../app/controllers/controller_report.php?action=createReport" method="POST" id="frm_create_report" name="frm_create_report">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="txt_refer">Productos</label>
                                                <select class="form-control" id="product" name="product" required>
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="txt_refer">Precio</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Precio" require>
                                            </div> 
                                        </div> 
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="txt_refer">Año</label>
                                                <input type="text" class="form-control" id="year" name="year" placeholder="Año" require>
                                            </div> 
                                        </div>  
                                    </div>  
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="btn_create_report" name="btn_create_report" class="btn btn-success"><i class="nav-icon fas fa-hamburger"></i> Crear</button>
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</div>


    <footer class="main-footer">
<?php 
        include "../../public/includes/footer.php";
?>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<!-- jQuery -->
<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../public/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../public/plugins/moment/moment.min.js"></script>
<script src="../../public/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        var error = '<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>';
        var success = '<?php echo isset($_GET['success']) ? $_GET['success'] : ''; ?>';
        var report_created = '<?php echo isset($_GET['report_created']) ? $_GET['report_created'] : ''; ?>';

        if (error === 'missing_data') 
        {
            toastr.error('No se pudo crear el producto. Por favor, verifica los datos.');
        } 
        
        if (success === 'product_created') 
        {
            toastr.success('Producto creado exitosamente.');
        }
         // Hacer una solicitud GET a la API para obtener la lista de productos
        $.get('../../app/controllers/controller_report.php', function(data) {
            console.log(data);
            // Iterar sobre los productos y agregarlos al select
            data.forEach(function(product) {
                $('#product').append(`<option value="${product.id}">${product.name}</option>`);
            });
        });

        //product select2
        $('#product').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>
</html>