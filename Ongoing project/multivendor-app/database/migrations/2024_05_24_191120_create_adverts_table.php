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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('video_link')->nullable();
            $table->string('ads_link')->nullable();
            $table->foreignIdFor(\App\Models\AdvertStatus::class)->constrained('advert_statuses')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\AdvertType::class)->constrained('advert_types')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\AdvertFormat::class)->constrained('advert_format')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
