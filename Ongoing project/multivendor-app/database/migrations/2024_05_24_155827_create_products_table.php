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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ProductCategory::class)->constrained('product_categories')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\ProductSubcategory::class)->constrained('product_subcategories')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Brand::class)->nullable()->constrained('brands')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class, 'vendor_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->text('specification')->nullable();
            $table->string('slug');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('qty');
            $table->string('tags')->nullable();
            $table->string('product_code')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('product_thumbnail');
            $table->string('video_url')->nullable();
            $table->boolean('best_seller')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('top_product')->default(0);
            $table->boolean('best_offer')->default(0);
            $table->boolean('special_offer')->default(0);
            $table->boolean('new_product')->default(0);
            $table->string('status')->default('Out of stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
