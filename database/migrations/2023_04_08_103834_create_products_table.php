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
            $table->string('name')->unique();
            $table->float('price')->unsigned();
            $table->float('offer')->unsigned()->default(0);
            $table->string('code')->nullable();
            $table->foreignId('store_id')->constrained('stores', 'id')->nullOnDelete();
            $table->foreignId('category_id')->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('coupon_id')->constrained('coupons', 'id')->nullOnDelete();
            $table->string('image');
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
