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
        Schema::table('favorites', function (Blueprint $table) {
            //
            $table->foreignId('product_id')->nullable()->constrained('products', 'id')->nullOnDelete()->after('coupon_id');
            $table->enum('position', ['coupon', 'product'])->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favorites', function (Blueprint $table) {
            //
            $table->dropColumn('product_id');
            $table->dropColumn('position');
        });
    }
};
