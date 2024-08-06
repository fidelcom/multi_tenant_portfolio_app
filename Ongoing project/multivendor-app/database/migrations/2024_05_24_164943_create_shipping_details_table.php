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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Country::class)->constrained('countries')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\State::class)->constrained('states')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\City::class)->constrained('cities')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('area')->nullable();
            $table->string('landmark')->nullable();
            $table->string('post_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
