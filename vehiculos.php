<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poblado Motors - Sistema de Gestión</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                <!-- Filters -->
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">Todas</button>
                    <button class="filter-tab" data-filter="Pendiente">Disponibles</button>
                    <button class="filter-tab" data-filter="En proceso">Vendidos</button>
                    <button class="filter-tab" data-filter="Completado">En servicio</button>
                </div>

                <!-- --------------------- -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="card client-card">
                            <div class="card-header">
                                <img src="img/1.jpeg" alt="" width="100%" height="200" class="imagen_vehiculo">
                            </div>
                            <div class="card-body">
                                <label class="text-dark titulo">Nombre</label><br>
                                <label class="text-secondary descrip">descripcion</label>
                                <br><br>
                                <h5 class="precio">$ <span>60.000.000</span> Cop</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card client-card">
                            <div class="card-header">
                                <img src="img/2.jpeg" alt="" width="100%" height="200" class="imagen_vehiculo">
                            </div>
                            <div class="card-body">
                                <label class="text-dark titulo">Nombre</label><br>
                                <label class="text-secondary descrip">descripcion</label>
                                <br><br>
                                <h5 class="precio">$ <span>70.000.000</span> Cop</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card client-card">
                            <div class="card-header">
                                <img src="img/3.jpeg" alt="" width="100%" height="200" class="imagen_vehiculo">
                            </div>
                            <div class="card-body">
                                <label class="text-dark titulo">Nombre</label><br>
                                <label class="text-secondary descrip">descripcion</label>
                                <br><br>
                                <h5 class="precio">$ <span>50.000.000</span> Cop</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="img/4.jpeg" alt="" width="100%" height="200" class="imagen_vehiculo">
                            </div>
                            <div class="card-body">
                                <label class="text-dark titulo">Nombre</label><br>
                                <label class="text-secondary descrip">descripcion</label>
                                <br><br>
                                <h5 class="precio">$ <span>55.000.000</span> Cop</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="background: #0f2a44;">
                    <div class="card-header text-white">Hola mundo</div>
                    <div class="card-body">
                        <p class="text-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia cumque soluta sequi molestias, ratione architecto ab. Nesciunt soluta eius ut dolorum accusamus suscipit quidem eum ea voluptatibus omnis! Eum, ex.
                        </p>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>