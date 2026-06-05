<?php
include 'modelo/Clientes.php';
$cliente = new Clientes('','','','','','','');
$row = $cliente->mostrar();
$total = $cliente->mostrarClientes();
$totalServicio = $cliente->mostrarServicios();



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poblado Motors - Clientes</title>
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

                <div class="toolbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <div class="search-box">
                        <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" id="client-search" placeholder="Buscar clientes...">
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Clientes" data-bs-whatever="@getbootstrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Nuevo Cliente
                    </button>
                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Total Clientes</h3>
                            <div class="stat-value"><?php echo $total['total'] ?></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Servicios del dia</h3>
                            <div class="stat-value"><?php echo $totalServicio['total'] ?></div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Clientes Activos</h3>
                            <div class="stat-value">8</div>
                        </div>
                    </div>
                </div>

                <!-- Client Grid -->
                <div class="client-grid" id="client-grid">
                    
                </div>

                <!-- -------------------------------------------------------- -->
                 <!-- creamos un foreach para recorre el arreglo que me trae los datos de la base de datos -->
                <?php foreach($row as $i){ ?>

                <div class="client-card">
                    <div class="client-header">
                        <div class="p-2">
                            <div class="client-name"><?php echo $i['cliente'] ?></div>
                            <div class="client-vehicle">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 17h14v-4H5v4zm0 0v2a2 2 0 002 2h10a2 2 0 002-2v-2M5 17V9m14 8V9M5 9V7a2 2 0 012-2h10a2 2 0 012 2v2M5 9h14"/>
                                </svg>
                                <span><?php echo $i['vehiculo'] ?></span>
                                <span class="client-plate"><?php echo $i['placa'] ?></span>
                            </div>
                        </div>
                        <div class="badge badge-secondary text-danger"> <h4><a href="controlador/Ctl_cliente.php?id_cliente=<?php echo $i['id_cliente'] ?>&operacion=Eliminar"><i class="fas fa-trash text-danger"></i></a></h4> </div>
                    </div>
                    <div class="client-info">
                        <div class="info-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span><?php echo $i['correo'] ?></span>
                        </div>
                        <div class="info-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span><?php echo $i['telefono'] ?></span>
                        </div>
                    </div>
                    <div class="client-footer">
                        <span>Último servicio: <b><?php echo $i['fecha'] ?></b></span>
                        <button>Ver historial</button>
                    </div>
                </div>
                
                <br>
                <?php } ?>
                <!-- ------------------------------------------------------------------ -->

                <!-- <div class="client-card">
                    <div class="client-header">
                        <div>
                            <div class="client-name">Lolo</div>
                            <div class="client-vehicle">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 17h14v-4H5v4zm0 0v2a2 2 0 002 2h10a2 2 0 002-2v-2M5 17V9m14 8V9M5 9V7a2 2 0 012-2h10a2 2 0 012 2v2M5 9h14"/>
                                </svg>
                                <span>mazda 3 2021</span>
                                <span class="client-plate">GHI-789</span>
                            </div>
                        </div>
                        <div class="badge badge-secondary"> servicios</div>
                    </div>
                    <div class="client-info">
                        <div class="info-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>lolo@gmail.com</span>
                        </div>
                        <div class="info-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>315 555 5555</span>
                        </div>
                    </div>
                    <div class="client-footer">
                        <span>Último servicio: 16/04/2026</span>
                        <button>Ver historial</button>
                    </div>
                </div> -->

            </div>
        </main>
    </div>


    <!-- Modal -->
        <div id="Clientes" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btnprimary">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    
                    <form action="controlador/Ctl_cliente.php" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="text-dark">Nombre Cliente</label>
                                <input type="text" name="cliente" class="border border-dark" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">Vehiculo</label>
                                <input type="text" name="vehiculo" class="border border-dark" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">placa</label>
                            <input type="text" name="placa" class="border border-dark" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">E-mail</label>
                            <input type="text" name="correo" class="border border-dark" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Telefono</label>
                            <input type="text" name="telefono" class="border border-dark" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary">Cancelar</button>
                        <button class="btn btn-primary" name="operacion" value="Guardar">Crear Cliente</button>
                    </div>
                </form>
            </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>