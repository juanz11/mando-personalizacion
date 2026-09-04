<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('ALTER TABLE orders MODIFY user_id BIGINT UNSIGNED NULL');
            return;
        }

        if ($this->userIdIsNullable()) {
            return;
        }

        $columns = 'id, user_id, order_number, status, payment_method, payment_receipt, total, customer_name, customer_email, customer_phone, shipping_address, shipping_city, shipping_zip, shipping_country, carrier, tracking_number, shipped_at, delivered_at, items_json, created_at, updated_at';

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders_new');

        Schema::create('orders_new', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_number')->unique();
            $table->string('status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->decimal('total', 10, 2)->default(0);
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            $table->text('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_zip');
            $table->string('shipping_country')->default('US');
            $table->string('carrier')->nullable();
            $table->string('tracking_number')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->text('items_json')->nullable();
            $table->timestamps();
        });

        DB::statement("INSERT INTO orders_new ({$columns}) SELECT {$columns} FROM orders");

        Schema::dropIfExists('orders');
        Schema::rename('orders_new', 'orders');

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('ALTER TABLE orders MODIFY user_id BIGINT UNSIGNED NOT NULL');
        }
    }

    private function userIdIsNullable(): bool
    {
        foreach (DB::select('PRAGMA table_info(orders)') as $column) {
            if ($column->name === 'user_id') {
                return ! $column->notnull;
            }
        }

        return false;
    }
};
