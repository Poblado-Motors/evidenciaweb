<?php

include 'modelo/Ordenes.php';
$ordenes = new Ordenes('','','','','','','','');
$row = $ordenes->mostrar();
$orden = $ordenes->mostrarOrdenes();
$ordenI = $ordenes->mostrarOrdenesI();

include 'modelo/Inventario.php';
$inventario = new Inventario('','','','','','','');
$inventStock = $inventario->mostrarStock();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poblado Motors - Sistema de Gestión</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <!-- Pantalla de Login -->
    

    <!-- Aplicación Principal -->
    <div class="main-app">
        <!-- Sidebar -->
        <?php include 'php/menu.php'; ?>

        <!-- Contenido Principal -->
        <main class="main-content">
            <!-- Header -->
            <?php include 'php/barra.php'; ?>

            <!-- Vistas -->
            <div id="content-area" class="content-area">
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Órdenes Activas</h3>
                            <div class="stat-value"><?php echo $orden['total'] ?></div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                <?php echo $orden['total'] ?>
                            </div>
                        </div>
                        <div class="stat-icon icon-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Servicios Completados</h3>
                            <div class="stat-value"><?php echo $ordenI['total'] ?></div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                <?php echo $ordenI['total'] ?>%
                            </div>
                        </div>
                        <div class="stat-icon icon-secondary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>En Proceso</h3>
                            <div class="stat-value">0</div>
                            <div class="stat-trend down">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                </svg>
                                0%
                            </div>
                        </div>
                        <div class="stat-icon icon-accent">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Alertas de Inventario</h3>
                            <div class="stat-value"><?php echo $inventStock['total'] ?></div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                <?php echo $inventStock['total'] ?>
                            </div>
                        </div>
                        <div class="stat-icon icon-danger">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <h2>Órdenes de Servicio</h2>
                        </div>
                        <div class="card-body">
                            <div class="bar-chart">
                                <p>barra de progreso</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>Ingresos Mensuales</h2>
                        </div>
                        <div class="card-body">
                            <div class="bar-chart">
                                <p>barra de progreso</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-header">
                        <h2>Órdenes Recientes</h2>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Vehículo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($row as $i){ ?>
                                    <tr>
                                        <td><?php echo $i['id_orden'] ?></td>
                                        <td><?php echo $i['cliente'] ?></td>
                                        <td><?php echo $i['vehiculo'] ?></td>
                                        <td><?php if($i['estado']==1){ echo '<span class="bg-success rounded-pill p-1 text-white text-center">Activo</span>'; }else{ echo '<span class="bg-danger rounded-pill p-1 text-white text-center">Inactivo</span>'; } ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>