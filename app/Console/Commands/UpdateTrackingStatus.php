<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\TrackingUpdate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTrackingStatus extends Command
{
    protected $signature = 'tracking:update {--id=} {--simulate}';
    protected $description = 'Actualiza automáticamente el estado de envío de las órdenes';

    public function handle(): int
    {
        $query = Order::query()->where('status', '!=', 'delivered');

        if ($this->option('id')) {
            $query->where('id', $this->option('id'));
        } else {
            $query->whereNotNull('tracking_number')->whereNotNull('shipped_at');
        }

        $orders = $query->get();

        if ($orders->isEmpty()) {
            $this->warn('No hay órdenes para actualizar.');
            return self::SUCCESS;
        }

        foreach ($orders as $order) {
            $this->updateOrder($order);
        }

        return self::SUCCESS;
    }

    protected function updateOrder(Order $order): void
    {
        $shippedAt = $order->shipped_at;
        $now = now();
        $diffHours = $shippedAt ? $shippedAt->diffInHours($now) : 0;

        $newStatus = null;
        $description = null;

        if ($this->option('simulate')) {
            $newStatus = match (true) {
                $diffHours >= 72 => 'delivered',
                $diffHours >= 48 => 'out_for_delivery',
                $diffHours >= 24 => 'in_transit',
                $diffHours >= 1 => 'shipped',
                default => null,
            };

            $description = match ($newStatus) {
                'shipped' => 'Paquete enviado, en espera de transporte.',
                'in_transit' => 'El paquete está en tránsito hacia su destino.',
                'out_for_delivery' => 'El paquete está en reparto y se entregará hoy.',
                'delivered' => 'El paquete fue entregado.',
                default => null,
            };
        } else {
            // Integrar API real aquí (Ej. ShipEngine, EasyPost, TrackingMore)
            // En producción consultar el carrier y tracking_number.
            $this->info("Orden #{$order->id} no actualizada: modo automático requiere integración con API de tracking.");
            return;
        }

        if ($newStatus && $newStatus !== $order->status) {
            $order->update([
                'status' => $newStatus,
                'delivered_at' => $newStatus === 'delivered' ? $now : $order->delivered_at,
            ]);

            TrackingUpdate::create([
                'order_id' => $order->id,
                'status' => $newStatus,
                'description' => $description,
                'location' => 'En ruta',
                'tracked_at' => $now,
            ]);

            $this->info("Orden #{$order->id} actualizada a {$newStatus}");
        }
    }
}
