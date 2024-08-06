<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\OrderStatus::class)->constrained('order_statuses')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class)->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Country::class)->constrained('countries')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\State::class)->constrained('states')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\City::class)->constrained('cities')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class, 'vendor_id')->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Shipping_details::class)->constrained('shipping_details')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('post_code');
            $table->text('notes')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('order_no');
            $table->string('invoice_no')->nullable();
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmation_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('returned_date')->nullable();
            $table->text('returned_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
