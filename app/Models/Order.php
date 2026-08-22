<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'shipping_city',
        'shipping_zip',
        'shipping_country',
        'carrier',
        'tracking_number',
        'shipped_at',
        'delivered_at',
        'items_json',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
        'items_json' => 'array',
    ];

    public static array $statuses = [
        'pending' => 'Pending',
        'paid' => 'Paid',
        'shipped' => 'Shipped',
        'in_transit' => 'In Transit',
        'out_for_delivery' => 'Out for Delivery',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled',
    ];

    public static array $carriers = [
        'usps' => 'USPS',
        'ups' => 'UPS',
        'fedex' => 'FedEx',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function trackingUpdates(): HasMany
    {
        return $this->hasMany(TrackingUpdate::class)->orderByDesc('tracked_at');
    }

    public function isShipped(): bool
    {
        return in_array($this->status, ['shipped', 'in_transit', 'out_for_delivery', 'delivered'], true);
    }

    public function statusLabel(): string
    {
        return self::$statuses[$this->status] ?? ucfirst($this->status);
    }

    public function trackingUrl(): ?string
    {
        if (!$this->tracking_number || !$this->carrier) {
            return null;
        }

        return match ($this->carrier) {
            'usps' => "https://tools.usps.com/go/TrackConfirmAction?tLabels={$this->tracking_number}",
            'ups' => "https://www.ups.com/track?tracknum={$this->tracking_number}",
            'fedex' => "https://www.fedex.com/fedextrack/?trknbr={$this->tracking_number}",
            default => null,
        };
    }
}
