<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poblado Motors - Reportes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png">
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

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <div>
                        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 4px;">Reportes y Análisis</h2>
                        <p style="color: var(--text-secondary);">Período: Enero - Junio 2026</p>
                    </div>
                    <button class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Exportar PDF
                    </button>
                </div>

                <!-- KPIs -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Ventas Totales</h3>
                            <div class="stat-value" style="font-size: 28px">30</div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                +18.5%
                            </div>
                        </div>
                        <div class="stat-icon icon-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Servicios Realizados</h3>
                            <div class="stat-value">25</div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                +12.3%
                            </div>
                        </div>
                        <div class="stat-icon icon-secondary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Ticket Promedio</h3>
                            <div class="stat-value" style="font-size: 24px">25</div>
                            <div class="stat-trend up">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                </svg>
                                +5.2%
                            </div>
                        </div>
                        <div class="stat-icon icon-accent">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <h2>Ventas Mensuales</h2>
                        </div>
                        <div class="card-body">
                            <div class="bar-chart">
                                <div class="bar" style="height: ${(item.sales / 22000000) * 100}%; background: var(--primary)">
                                    <span class="bar-label">16/04/2026</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>Servicios por Mes</h2>
                        </div>
                        <div class="card-body">
                            <div class="bar-chart">
                                <div class="bar" style="height: 100%; background: #1a7a8a">
                                    <span class="bar-label">16/04/2026</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Services -->
                <div class="card">
                    <div class="card-header">
                        <h2>Top 5 Servicios</h2>
                    </div>
                    <div class="card-body">
                            <div style="margin-bottom: 20px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                    <span style="font-weight: 500;"></span>
                                    <span style="color: #1a7a8a; font-size: 14px;">servicios</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="progress-bar" style="flex: 1;">
                                        <div class="progress-fill" style="width: 100%"></div>
                                    </div>
                                    <span style="font-weight: 600; min-width: 100px; text-align: right;"></span>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>