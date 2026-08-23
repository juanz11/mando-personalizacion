<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Órdenes - RTE Custom Controller</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .admin-page { min-height: 100vh; background: #0b0d10; padding: 40px 24px 60px; font-family: 'Poppins', sans-serif; }
        .admin-header { max-width: 1200px; margin: 0 auto 32px; display: flex; justify-content: space-between; align-items: center; }
        .admin-header h1 { font-size: 2rem; font-weight: 700; }
        .admin-header small { color: #a1a5ab; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; max-width: 1200px; margin: 0 auto 32px; }
        .stat-card { background: #121418; border: 1px solid #26282c; border-radius: 16px; padding: 22px; }
        .stat-card .label { font-size: 0.85rem; color: #a1a5ab; margin-bottom: 6px; }
        .stat-card .value { font-size: 1.6rem; font-weight: 700; }
        .admin-card { background: #121418; border: 1px solid #26282c; border-radius: 20px; padding: 32px; max-width: 1200px; margin: 0 auto; }
        .admin-card h2 { font-size: 1.25rem; margin-bottom: 24px; font-weight: 600; }
        table { width: 100%; border-collapse: separate; border-spacing: 0; }
        th, td { text-align: left; padding: 14px 12px; border-bottom: 1px solid #26282c; }
        th { color: #a1a5ab; font-weight: 500; font-size: 0.85rem; text-transform: uppercase; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #0e1013; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
        .badge-pending { background: #3a2e00; color: #ffcc00; }
        .badge-paid { background: #003300; color: #4ade80; }
        .badge-shipped { background: #001a33; color: #60a5fa; }
        .badge-in_transit { background: #1e1b4b; color: #818cf8; }
        .badge-out_for_delivery { background: #3b0764; color: #c084fc; }
        .badge-delivered { background: #064e3b; color: #34d399; }
        .badge-cancelled { background: #3f0000; color: #ff5a5a; }
        .logout { background: #1f2937; color: #fff; border: 1px solid #374151; border-radius: 10px; padding: 10px 18px; font-size: 0.9rem; cursor: pointer; }
        .logout:hover { background: #374151; }
        .btn-view { display: inline-block; padding: 6px 14px; background: #4ade80; color: #000; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.8rem; }
        .pagination { margin-top: 24px; }
    </style>
</head>
<body>
<div class="admin-page">
    <div class="admin-header">
        <div>
            <h1>Panel de Administración</h1>
            <small>Gestión de órdenes y envíos</small>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout">Cerrar sesión</button>
        </form>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="label">Total Órdenes</div>
            <div class="value">{{ $stats['total'] }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Pendientes</div>
            <div class="value">{{ $stats['pending'] }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Pagadas</div>
            <div class="value">{{ $stats['paid'] }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Enviadas</div>
            <div class="value">{{ $stats['shipped'] }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Entregadas</div>
            <div class="value">{{ $stats['delivered'] }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Ingresos</div>
            <div class="value">${{ number_format($stats['revenue'], 2) }}</div>
        </div>
    </div>

    <div class="admin-card">
        <h2>Últimas Órdenes</h2>
        <table>
            <thead>
            <tr>
                <th># Orden</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Tracking</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td><span class="badge badge-{{ $order->status }}">{{ $order->statusLabel() }}</span></td>
                    <td>{{ $order->tracking_number ?? '-' }}</td>
                    <td><a href="{{ route('admin.orders.show', $order) }}" class="btn-view">Ver</a></td>
                </tr>
            @empty
                <tr><td colspan="7">No hay órdenes aún.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $orders->links() }}</div>
    </div>
</div>
</body>
</html>
