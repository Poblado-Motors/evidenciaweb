<?php
include 'modelo/Inventario.php';
$inventario = new Inventario('','','','','','','');
$row = $inventario->mostrar();
$invent = $inventario->mostrarInventario();
$inventStock = $inventario->mostrarStock();
$sumaStock = $inventario->sumarStock();



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poblado Motors - Inventario</title>
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

            <?php if($inventStock['total']){ ?>
                <div class="alert alert-danger">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <div>
                        <h3>Alertas de Inventario</h3>
                        <p>producto(s) con stock bajo el mínimo requerido</p>
                    </div>
                </div>
            <?php }else{ } ?>
        

        <!-- Toolbar -->
        <div class="toolbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="inventory-search" placeholder="Buscar repuestos...">
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#inventario" data-bs-whatever="@getbootstrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Nuevo Repuesto
            </button>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Total Productos</h3>
                    <div class="stat-value"><?php echo $invent['total'] ?></div>
                </div>
                <div class="stat-icon icon-primary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Stock Bajo</h3>
                    <div class="stat-value"><?php echo $inventStock['total'] ?></div>
                </div>
                <div class="stat-icon icon-danger">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Valor Inventario</h3>
                    <div class="stat-value" style="font-size: 24px"><?php echo '$'. number_format($sumaStock['total']) ?></div>
                </div>
                <div class="stat-icon icon-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Stock Mín.</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody id="inventory-table-body">
                        <?php foreach($row as $i){ ?>
                            <tr>
                                <td><?php echo $i['codigo'] ?></td>
                                <td><?php echo $i['producto'] ?></td>
                                <td><?php echo $i['categoria'] ?></td>
                                <td><?php echo $i['stock'] ?></td>
                                <td><?php echo $i['stock_min'] ?></td>
                                <td><?php echo '$'. number_format($i['precio']) ?></td>
                                <td>
                                    <?php if($i['stock'] >= 10){ ?>
                                        <p><span class="alert alert-success">Normal</span></p>
                                    <?php }else{ ?>
                                        <p><span class="alert alert-danger">Stock Bajo</span></p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a class="filter-tab active" type="button" data-bs-toggle="modal" data-bs-target="#inventario<?php echo $i['codigo'] ?>" data-bs-whatever="@getbootstrap"><i class="fas fa-pen"></i> Editar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </main>
</div>

<!-- modal -->
 <div id="inventario" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btnprimary">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    
                    <form action="controlador/Ctl_inventario.php" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="text-dark">Codigo</label>
                                <input type="text" name="codigo" class="border border-dark" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">Producto</label>
                                <input type="text" name="producto" class="border border-dark" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Categoria</label>
                            <input type="text" name="categoria" class="border border-dark" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Stock</label>
                            <input type="text" name="stock" class="border border-dark" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Stock minimo</label>
                            <input type="text" name="stock_min" class="border border-dark" required>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Precio</label>
                            <input type="text" name="precio" class="border border-dark" required>
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



        <?php foreach($row as $i){ ?>
        <div id="inventario<?php echo $i['codigo'] ?>" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btnprimary">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    
                    <form action="controlador/Ctl_inventario.php" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="text-dark">Codigo</label>
                                <input type="text" name="codigo" class="border border-dark" readonly value="<?php echo $i['codigo'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-dark">Producto</label>
                                <input type="text" name="producto" class="border border-dark" required value="<?php echo $i['producto'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Categoria</label>
                            <input type="text" name="categoria" class="border border-dark" required value="<?php echo $i['categoria'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Stock</label>
                            <input type="text" name="stock" class="border border-dark" required value="<?php echo $i['stock'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Stock minimo</label>
                            <input type="text" name="stock_min" class="border border-dark" required value="<?php echo $i['stock_min'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Precio</label>
                            <input type="text" name="precio" class="border border-dark" required value="<?php echo $i['precio'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary">Cancelar</button>
                        <button class="btn btn-primary" name="operacion" value="Editar">Editar Producto</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <?php } ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>