<?php
include 'modelo/Ordenes.php';
$ordenes = new Ordenes('','','','','','','','');
$row = $ordenes->mostrar();
// $total = $cliente->mostrarClientes();
// $totalServicio = $cliente->mostrarServicios();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Poblado Motors - Órdenes</title>
</head>
<body>
    <div class="main-app">
        <?php include 'php/menu.php'; ?>

        <main class="main-content">
        <?php include 'php/barra.php'; ?>

        <div id="content-area" class="content-area">

        <div class="toolbar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="order-search" placeholder="Buscar por cliente, vehículo o ID...">
            </div>
            <!-- <button class="btn btn-primary" onclick="openOrderModal()"> -->
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#orden" data-bs-whatever="@getbootstrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Nueva Orden
            </button>
        </div>

        <!-- Filters -->
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">Todas</button>
            <button class="filter-tab" data-filter="Pendiente">Pendiente</button>
            <button class="filter-tab" data-filter="En proceso">En proceso</button>
            <button class="filter-tab" data-filter="Completado">Completado</button>
        </div>

        <!-- Orders Table -->
        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Vehículo</th>
                            <th>Servicio</th>
                            <th>Estado</th>
                            <th>Prioridad</th>
                            <th>Costo Est.</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="orders-table-body">
                        <?php foreach($row as $i){ ?>
                            <tr>
                                <td><?php echo $i['id_orden'] ?></td>
                                <td><?php echo $i['cliente'] ?></td>
                                <td><?php echo $i['vehiculo'] ?></td>
                                <td><?php echo $i['servicio'] ?></td>
                                <?php if($i['estado']==1){ ?><td><p class="bg-success rounded-pill p-1 text-white text-center">Activo</p></td><?php }else{ ?><td><p class="bg-success rounded-pill p-1 text-white text-center">Inactivo</p></td><?php } ?>
                                <td><?php echo $i['prioridad'] ?></td>
                                <td><?php echo '$'. number_format($i['costo']) ?></td>
                                <td>
                                    <a href="controlador/Ctl_ordenes.php?id_orden=<?php echo $i['id_orden'] ?>&operacion=Eliminar" class="text-danger"><i class="fas fa-trash"></i></a>
                                    <a class="filter-tab active" type="button" data-bs-toggle="modal" data-bs-target="#orden<?php echo $i['id_orden'] ?>" data-bs-whatever="@getbootstrap"><i class="fas fa-pen"></i> Editar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="order-modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Nueva Orden de Servicio</h2>
                </div>
                <div class="modal-body">
                    <form id="order-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" required>
                            </div>
                            <div class="form-group">
                                <label>Vehículo</label>
                                <input type="text" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Servicio</label>
                                <input type="text" required>
                            </div>
                            <div class="form-group">
                                <label>Prioridad</label>
                                <select>
                                    <option>Baja</option>
                                    <option>Media</option>
                                    <option>Alta</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeOrderModal()">Cancelar</button>
                    <button class="btn btn-primary" onclick="closeOrderModal()">Crear Orden</button>
                </div>
            </div>
        </div>
        </div>
    </main>
    </div>

    <!-- modal -->
     <div class="modal fade" id="orden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Orden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controlador/Ctl_ordenes.php" method="POST">
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
                    <label class="text-dark">Servicio</label>
                    <input type="text" name="servicio" class="border border-dark" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Prioridad</label>
                    <input type="text" name="prioridad" class="border border-dark" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Descripcion</label>
                    <textarea name="descripcion" class="border border-dark" required></textarea>
                </div>
                <div class="form-group">
                    <label class="text-dark">Costo</label>
                    <input type="text" name="costo" class="border border-dark" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary" name="operacion" value="Guardar">Crear Orden</button>
            </div>
        </form>
    </div>
  </div>
</div>


<?php foreach($row as $i){ ?>
 <!-- modal -->
     <div class="modal fade" id="orden<?php echo $i['id_orden'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Orden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controlador/Ctl_ordenes.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label class="text-dark">Nombre Cliente</label>
                        <input type="hidden" name="id_orden" class="border border-dark" required value="<?php echo $i['id_orden'] ?>">
                        <input type="text" name="cliente" class="border border-dark" required value="<?php echo $i['cliente'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Vehiculo</label>
                        <input type="text" name="vehiculo" class="border border-dark" required value="<?php echo $i['vehiculo'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark">Servicio</label>
                    <input type="text" name="servicio" class="border border-dark" required value="<?php echo $i['servicio'] ?>">
                </div>
                <div class="form-group">
                    <label class="text-dark">Prioridad</label>
                    <input type="text" name="prioridad" class="border border-dark" required value="<?php echo $i['prioridad'] ?>">
                </div>
                <div class="form-group">
                    <label class="text-dark">Descripcion</label>
                    <textarea name="descripcion" class="border border-dark" required><?php echo $i['descripcion'] ?></textarea>
                </div>
                <div class="form-group">
                    <label class="text-dark">Costo</label>
                    <input type="text" name="costo" class="border border-dark" required value="<?php echo $i['costo'] ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary" name="operacion" value="Editar">Editar Orden</button>
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