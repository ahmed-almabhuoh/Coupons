<?php

use App\Models\Aqs;
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
        Schema::create('aqs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('answer');
            $table->enum('status', Aqs::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqs');
    }
};
