<?php

use App\Models\Coupon;
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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->enum('status', Coupon::STATUS);
            $table->float('discount')->unsigned();
            $table->string('code')->unique();

            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id');

            $table->foreignId('store_id');
            $table->foreign('store_id')->on('stores')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
