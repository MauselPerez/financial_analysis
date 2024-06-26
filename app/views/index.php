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
	<title>Reporte de productos</title>
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title" style="color: red;">Reporte de Productos 
                            </h6>
                            <a href="create_report.php" class="btn btn-primary" style="float: right;">Crear Reporte</a>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="productSelect">Selecciona un producto:</label>
                                <select id="productSelect" class="form-control">
                                    <!-- Los options se cargarán dinámicamente con JavaScript -->
                                </select>
                            </div>
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        // Obtener los productos y llenar el select
        $.get('../../app/controllers/controller_index.php', function(data) {
            $.each(data, function(productId, productData) {
                var option = $('<option>').val(productId).text(productData.product);
                $('#productSelect').append(option);
            });
        });

        // Evento de cambio para el select
        $('#productSelect').change(function() {
            var productId = $(this).val();
            // Enviar el ID del producto seleccionado al controlador
            $.get('../../app/controllers/controller_index.php', { productId: productId }, function(response) {
                console.log(response);
                var product = response.product;
                var chartData = response.data.data;
                var labels = chartData.map(function(item) {
                    return item.year;
                });
                var prices = chartData.map(function(item) {
                    return item.price;
                });
                createChart(product, labels, prices);
            });
        });
    });

    var myChart; // Declara la variable fuera de la función createChart

    function createChart(product, labels, prices) {
        var ctx = document.getElementById('barChart').getContext('2d');
        if (myChart) {
            myChart.destroy();
        }
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: product,
                    data: prices,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return '$' + value;
                            }
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return '$' + tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    }
</script>

</body>
</html>