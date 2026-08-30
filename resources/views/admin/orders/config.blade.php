<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Orden #{{ $order->order_number }}</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
            color: #000;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 20mm;
            page-break-after: always;
        }
        .page:last-child { page-break-after: auto; }
        h1 { font-size: 1.5rem; margin: 0 0 0.5rem; }
        .meta { color: #555; margin-bottom: 1rem; font-size: 0.9rem; }
        h2 { font-size: 1.2rem; margin: 1.5rem 0 0.75rem; }
        .controller-stack {
            position: relative;
            width: 100%;
            max-width: 170mm;
            margin: 0 auto;
        }
        .controller-stack img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            display: block;
        }
        .controller-stack img:first-child {
            position: relative;
        }
        .print-btn {
            position: fixed;
            top: 12px;
            right: 12px;
            background: #4ade80;
            color: #000;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
        }
        @media print {
            .print-btn { display: none; }
            .page { padding: 0; margin: 0; width: 100%; }
            .controller-stack { max-width: 100%; }
            body { background: #fff; }
        }
    </style>
</head>
<body>
    <button class="print-btn" onclick="window.print()">Guardar como PDF</button>

    <div class="page">
        <h1>Configuración Orden #{{ $order->order_number }}</h1>
        <p class="meta">
            <strong>Cliente:</strong> {{ $order->customer_name }}<br>
            <strong>Modelo:</strong> {{ strtoupper($model) }}<br>
            @if(!empty($config['summary']))
                <strong>Detalle:</strong> {{ $config['summary'] }}
            @endif
        </p>
        <h2>Frente</h2>
        <div class="controller-stack">
            @foreach($frontLayers as $layer)
                <img src="{{ $layer }}" alt="Capa frontal">
            @endforeach
        </div>
    </div>

    <div class="page">
        <h2>Espalda</h2>
        <div class="controller-stack">
            @foreach($backLayers as $layer)
                <img src="{{ $layer }}" alt="Capa trasera">
            @endforeach
        </div>
    </div>
</body>
</html>
