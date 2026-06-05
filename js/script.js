// ============================================
// DATOS MOCK
// ============================================

const mockData = {
    orders: [
        { id: 'ORD-001', client: 'Carlos Mendoza', vehicle: 'Toyota Corolla 2020', service: 'Cambio de aceite y filtros', status: 'En proceso', priority: 'Media', date: '2026-04-12', estimatedCost: 250000 },
        { id: 'ORD-002', client: 'María González', vehicle: 'Honda Civic 2019', service: 'Revisión de frenos', status: 'Completado', priority: 'Alta', date: '2026-04-11', estimatedCost: 450000 },
        { id: 'ORD-003', client: 'Juan Pérez', vehicle: 'Mazda 3 2021', service: 'Alineación y balanceo', status: 'Pendiente', priority: 'Baja', date: '2026-04-12', estimatedCost: 180000 },
        { id: 'ORD-004', client: 'Ana Rodríguez', vehicle: 'Chevrolet Spark 2018', service: 'Cambio de pastillas de freno', status: 'En proceso', priority: 'Alta', date: '2026-04-10', estimatedCost: 320000 },
        { id: 'ORD-005', client: 'Luis Martínez', vehicle: 'Nissan Versa 2020', service: 'Mantenimiento general', status: 'Completado', priority: 'Media', date: '2026-04-09', estimatedCost: 550000 },
    ],
    inventory: [
        { id: 1, code: 'REP-001', name: 'Aceite Motor 10W-40', category: 'Lubricantes', stock: 45, minStock: 20, price: 35000, status: 'normal' },
        { id: 2, code: 'REP-002', name: 'Filtro de Aceite', category: 'Filtros', stock: 8, minStock: 15, price: 25000, status: 'low' },
        { id: 3, code: 'REP-003', name: 'Pastillas de Freno Delanteras', category: 'Frenos', stock: 22, minStock: 10, price: 85000, status: 'normal' },
        { id: 4, code: 'REP-004', name: 'Batería 12V 60Ah', category: 'Eléctrico', stock: 3, minStock: 8, price: 320000, status: 'low' },
        { id: 5, code: 'REP-005', name: 'Llanta 185/65 R15', category: 'Llantas', stock: 16, minStock: 12, price: 180000, status: 'normal' },
        { id: 6, code: 'REP-006', name: 'Bujías (Set 4 unidades)', category: 'Motor', stock: 30, minStock: 15, price: 45000, status: 'normal' },
        { id: 7, code: 'REP-007', name: 'Refrigerante Verde 1L', category: 'Lubricantes', stock: 5, minStock: 12, price: 18000, status: 'low' },
        { id: 8, code: 'REP-008', name: 'Amortiguador Delantero', category: 'Suspensión', stock: 12, minStock: 8, price: 150000, status: 'normal' },
    ],
    clients: [
        { id: 1, name: 'Carlos Mendoza', email: 'carlos.m@email.com', phone: '+57 301 234 5678', vehicle: 'Toyota Corolla 2020', plate: 'ABC-123', services: 12, lastService: '2026-04-12' },
        { id: 2, name: 'María González', email: 'maria.g@email.com', phone: '+57 302 345 6789', vehicle: 'Honda Civic 2019', plate: 'DEF-456', services: 8, lastService: '2026-04-11' },
        { id: 3, name: 'Juan Pérez', email: 'juan.p@email.com', phone: '+57 303 456 7890', vehicle: 'Mazda 3 2021', plate: 'GHI-789', services: 5, lastService: '2026-04-12' },
        { id: 4, name: 'Ana Rodríguez', email: 'ana.r@email.com', phone: '+57 304 567 8901', vehicle: 'Chevrolet Spark 2018', plate: 'JKL-012', services: 15, lastService: '2026-04-10' },
        { id: 5, name: 'Luis Martínez', email: 'luis.m@email.com', phone: '+57 305 678 9012', vehicle: 'Nissan Versa 2020', plate: 'MNO-345', services: 7, lastService: '2026-04-09' },
        { id: 6, name: 'Sandra López', email: 'sandra.l@email.com', phone: '+57 306 789 0123', vehicle: 'Kia Rio 2021', plate: 'PQR-678', services: 10, lastService: '2026-04-08' },
    ],
    salesData: [
        { month: 'Ene', sales: 12500000, services: 45 },
        { month: 'Feb', sales: 15200000, services: 52 },
        { month: 'Mar', sales: 14800000, services: 48 },
        { month: 'Abr', sales: 18900000, services: 61 },
        { month: 'May', sales: 17200000, services: 55 },
        { month: 'Jun', sales: 21400000, services: 67 },
    ],
    topServices: [
        { service: 'Cambio de aceite y filtros', count: 89, revenue: 22250000 },
        { service: 'Revisión de frenos', count: 45, revenue: 20250000 },
        { service: 'Mantenimiento general', count: 38, revenue: 20900000 },
        { service: 'Alineación y balanceo', count: 52, revenue: 9360000 },
        { service: 'Cambio de pastillas', count: 34, revenue: 10880000 },
    ]
};

// ============================================
// UTILIDADES
// ============================================

function formatCurrency(amount) {
    return new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0 }).format(amount);
}

function getStatusBadgeClass(status) {
    const statusMap = {
        'Completado': 'badge-success',
        'En proceso': 'badge-secondary',
        'Pendiente': 'badge-muted'
    };
    return statusMap[status] || 'badge-muted';
}

function getPriorityBadgeClass(priority) {
    const priorityMap = {
        'Alta': 'badge-danger',
        'Media': 'badge-secondary',
        'Baja': 'badge-muted'
    };
    return priorityMap[priority] || 'badge-muted';
}

// ============================================
// GESTIÓN DE VISTAS
// ============================================

const views = {
    dashboard: () => renderDashboard(),
    orders: () => renderOrders(),
    inventory: () => renderInventory(),
    clients: () => renderClients(),
    reports: () => renderReports()
};

const viewTitles = {
    dashboard: 'Dashboard',
    orders: 'Órdenes de Servicio',
    inventory: 'Inventario',
    clients: 'Clientes',
    reports: 'Reportes'
};

function changeView(viewName) {
    // Actualizar título
    document.getElementById('page-title').textContent = viewTitles[viewName];

    // Actualizar navegación activa
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
        if (item.dataset.view === viewName) {
            item.classList.add('active');
        }
    });

    // Renderizar vista
    if (views[viewName]) {
        views[viewName]();
    }
}

// ============================================
// VISTAS
// ============================================

function renderDashboard() {
    const contentArea = document.getElementById('content-area');

    // Calcular estadísticas
    const activeOrders = mockData.orders.filter(o => o.status === 'En proceso').length;
    const completedOrders = mockData.orders.filter(o => o.status === 'Completado').length;
    const lowStock = mockData.inventory.filter(i => i.status === 'low').length;

    contentArea.innerHTML = `
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Órdenes Activas</h3>
                    <div class="stat-value">${activeOrders}</div>
                    <div class="stat-trend up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        </svg>
                        +12%
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
                    <div class="stat-value">${completedOrders}</div>
                    <div class="stat-trend up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        </svg>
                        +8%
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
                    <div class="stat-value">${mockData.orders.length - completedOrders}</div>
                    <div class="stat-trend down">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                        </svg>
                        -3%
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
                    <div class="stat-value">${lowStock}</div>
                    <div class="stat-trend up">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        </svg>
                        +2
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
                        ${mockData.salesData.map(item => `
                            <div class="bar" style="height: ${(item.services / 70) * 100}%">
                                <span class="bar-label">${item.month}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Ingresos Mensuales</h2>
                </div>
                <div class="card-body">
                    <div class="bar-chart">
                        ${mockData.salesData.map(item => `
                            <div class="bar" style="height: ${(item.sales / 22000000) * 100}%; background: var(--secondary)">
                                <span class="bar-label">${item.month}</span>
                            </div>
                        `).join('')}
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
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${mockData.orders.slice(0, 4).map(order => `
                            <tr>
                                <td><strong>${order.id}</strong></td>
                                <td>${order.client}</td>
                                <td style="color: var(--text-secondary)">${order.vehicle}</td>
                                <td><span class="badge ${getStatusBadgeClass(order.status)}">${order.status}</span></td>
                                <td style="color: var(--text-secondary)">${order.date}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        </div>
    `;
}

function renderOrders() {
    const contentArea = document.getElementById('content-area');

    contentArea.innerHTML = `
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="order-search" placeholder="Buscar por cliente, vehículo o ID...">
            </div>
            <button class="btn btn-primary" onclick="openOrderModal()">
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
                        ${renderOrdersTable(mockData.orders)}
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
    `;

    // Event listeners
    document.getElementById('order-search').addEventListener('input', filterOrders);
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            filterOrders();
        });
    });
}

function renderOrdersTable(orders) {
    return orders.map(order => `
        <tr>
            <td><strong style="color: var(--primary)">${order.id}</strong></td>
            <td>${order.client}</td>
            <td style="color: var(--text-secondary)">${order.vehicle}</td>
            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${order.service}</td>
            <td><span class="badge ${getStatusBadgeClass(order.status)}">${order.status}</span></td>
            <td><span class="badge ${getPriorityBadgeClass(order.priority)}">${order.priority}</span></td>
            <td><strong>${formatCurrency(order.estimatedCost)}</strong></td>
            <td>
                <div class="action-btns">
                    <button class="action-btn" title="Ver">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    <button class="action-btn" title="Editar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </button>
                    <button class="action-btn delete" title="Eliminar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

function filterOrders() {
    const searchTerm = document.getElementById('order-search').value.toLowerCase();
    const activeFilter = document.querySelector('.filter-tab.active').dataset.filter;

    let filtered = mockData.orders;

    // Filter by status
    if (activeFilter !== 'all') {
        filtered = filtered.filter(order => order.status === activeFilter);
    }

    // Filter by search
    if (searchTerm) {
        filtered = filtered.filter(order =>
            order.client.toLowerCase().includes(searchTerm) ||
            order.vehicle.toLowerCase().includes(searchTerm) ||
            order.id.toLowerCase().includes(searchTerm)
        );
    }

    document.getElementById('orders-table-body').innerHTML = renderOrdersTable(filtered);
}

function openOrderModal() {
    document.getElementById('order-modal').classList.add('active');
}

function closeOrderModal() {
    document.getElementById('order-modal').classList.remove('active');
}

function renderInventory() {
    const contentArea = document.getElementById('content-area');
    const lowStockItems = mockData.inventory.filter(item => item.status === 'low');
    const totalValue = mockData.inventory.reduce((sum, item) => sum + (item.stock * item.price), 0);

    contentArea.innerHTML = `
        ${lowStockItems.length > 0 ? `
        <div class="alert alert-danger">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
            <div>
                <h3>Alertas de Inventario</h3>
                <p>${lowStockItems.length} producto(s) con stock bajo el mínimo requerido</p>
            </div>
        </div>
        ` : ''}

        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="inventory-search" placeholder="Buscar repuestos...">
            </div>
            <button class="btn btn-primary">
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
                    <div class="stat-value">${mockData.inventory.length}</div>
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
                    <div class="stat-value">${lowStockItems.length}</div>
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
                    <div class="stat-value" style="font-size: 24px">${formatCurrency(totalValue)}</div>
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
                        </tr>
                    </thead>
                    <tbody id="inventory-table-body">
                        ${mockData.inventory.map(item => `
                            <tr>
                                <td><strong style="color: var(--primary)">${item.code}</strong></td>
                                <td><strong>${item.name}</strong></td>
                                <td style="color: var(--text-secondary)">${item.category}</td>
                                <td><strong style="color: ${item.status === 'low' ? 'var(--danger)' : 'var(--text-primary)'}">${item.stock}</strong></td>
                                <td style="color: var(--text-secondary)">${item.minStock}</td>
                                <td><strong>${formatCurrency(item.price)}</strong></td>
                                <td>
                                    ${item.status === 'low' ?
                                        '<span class="badge badge-danger">Stock Bajo</span>' :
                                        '<span class="badge badge-success">Normal</span>'
                                    }
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        </div>
    `;

    document.getElementById('inventory-search').addEventListener('input', filterInventory);
}

function filterInventory() {
    const searchTerm = document.getElementById('inventory-search').value.toLowerCase();
    const filtered = mockData.inventory.filter(item =>
        item.name.toLowerCase().includes(searchTerm) ||
        item.code.toLowerCase().includes(searchTerm) ||
        item.category.toLowerCase().includes(searchTerm)
    );

    document.getElementById('inventory-table-body').innerHTML = filtered.map(item => `
        <tr>
            <td><strong style="color: var(--primary)">${item.code}</strong></td>
            <td><strong>${item.name}</strong></td>
            <td style="color: var(--text-secondary)">${item.category}</td>
            <td><strong style="color: ${item.status === 'low' ? 'var(--danger)' : 'var(--text-primary)'}">${item.stock}</strong></td>
            <td style="color: var(--text-secondary)">${item.minStock}</td>
            <td><strong>${formatCurrency(item.price)}</strong></td>
            <td>
                ${item.status === 'low' ?
                    '<span class="badge badge-danger">Stock Bajo</span>' :
                    '<span class="badge badge-success">Normal</span>'
                }
            </td>
        </tr>
    `).join('');
}

function renderClients() {
    const contentArea = document.getElementById('content-area');

    contentArea.innerHTML = `
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="client-search" placeholder="Buscar clientes...">
            </div>
            <button class="btn btn-primary">
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
                    <div class="stat-value">${mockData.clients.length}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Servicios este mes</h3>
                    <div class="stat-value">24</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Clientes Activos</h3>
                    <div class="stat-value">${mockData.clients.filter(c => c.services > 0).length}</div>
                </div>
            </div>
        </div>

        <!-- Client Grid -->
        <div class="client-grid" id="client-grid">
            ${renderClientCards(mockData.clients)}
        </div>
    `;

    document.getElementById('client-search').addEventListener('input', filterClients);
}

function renderClientCards(clients) {
    return clients.map(client => `
        <div class="client-card">
            <div class="client-header">
                <div>
                    <div class="client-name">${client.name}</div>
                    <div class="client-vehicle">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 17h14v-4H5v4zm0 0v2a2 2 0 002 2h10a2 2 0 002-2v-2M5 17V9m14 8V9M5 9V7a2 2 0 012-2h10a2 2 0 012 2v2M5 9h14"/>
                        </svg>
                        <span>${client.vehicle}</span>
                        <span class="client-plate">${client.plate}</span>
                    </div>
                </div>
                <div class="badge badge-secondary">${client.services} servicios</div>
            </div>
            <div class="client-info">
                <div class="info-row">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>${client.email}</span>
                </div>
                <div class="info-row">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span>${client.phone}</span>
                </div>
            </div>
            <div class="client-footer">
                <span>Último servicio: ${client.lastService}</span>
                <button>Ver historial</button>
            </div>
        </div>
    `).join('');
}

function filterClients() {
    const searchTerm = document.getElementById('client-search').value.toLowerCase();
    const filtered = mockData.clients.filter(client =>
        client.name.toLowerCase().includes(searchTerm) ||
        client.email.toLowerCase().includes(searchTerm) ||
        client.vehicle.toLowerCase().includes(searchTerm) ||
        client.plate.toLowerCase().includes(searchTerm)
    );

    document.getElementById('client-grid').innerHTML = renderClientCards(filtered);
}

function renderReports() {
    const contentArea = document.getElementById('content-area');
    const totalSales = mockData.salesData.reduce((sum, item) => sum + item.sales, 0);
    const totalServices = mockData.salesData.reduce((sum, item) => sum + item.services, 0);
    const avgTicket = totalSales / totalServices;
    const maxRevenue = Math.max(...mockData.topServices.map(s => s.revenue));

    contentArea.innerHTML = `
        <!-- Header -->
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
                    <div class="stat-value" style="font-size: 28px">${formatCurrency(totalSales)}</div>
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
                    <div class="stat-value">${totalServices}</div>
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
                    <div class="stat-value" style="font-size: 24px">${formatCurrency(avgTicket)}</div>
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
                        ${mockData.salesData.map(item => `
                            <div class="bar" style="height: ${(item.sales / 22000000) * 100}%; background: var(--primary)">
                                <span class="bar-label">${item.month}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Servicios por Mes</h2>
                </div>
                <div class="card-body">
                    <div class="bar-chart">
                        ${mockData.salesData.map(item => `
                            <div class="bar" style="height: ${(item.services / 70) * 100}%; background: var(--secondary)">
                                <span class="bar-label">${item.month}</span>
                            </div>
                        `).join('')}
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
                ${mockData.topServices.map(service => `
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-weight: 500;">${service.service}</span>
                            <span style="color: var(--text-secondary); font-size: 14px;">${service.count} servicios</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div class="progress-bar" style="flex: 1;">
                                <div class="progress-fill" style="width: ${(service.revenue / maxRevenue) * 100}%"></div>
                            </div>
                            <span style="font-weight: 600; min-width: 100px; text-align: right;">${formatCurrency(service.revenue)}</span>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;
}

// ============================================
// INICIALIZACIÓN
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    // Login form
    // document.getElementById('login-form').addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     document.getElementById('login-screen').classList.add('hidden');
    //     document.getElementById('main-app').classList.remove('hidden');
    //     changeView('dashboard');
    // });

    // Navigation
    document.querySelectorAll('.nav-item[data-view]').forEach(item => {
        item.addEventListener('click', function() {
            const view = this.dataset.view;
            changeView(view);
        });
    });

    // Logout
    document.getElementById('logout-btn').addEventListener('click', function() {
        window.location = 'index.php';
        // document.getElementById('main-app').classList.add('hidden');
        // document.getElementById('login-screen').classList.remove('hidden');
        // document.getElementById('login-form').reset();
    });
});