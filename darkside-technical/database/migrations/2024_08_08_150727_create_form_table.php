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
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('email')->default('');;
            $table->string('phone')->default('');;
            $table->string('house_number')->default('');;
            $table->string('address_1')->default('');;
            $table->string('address_2')->default('');;
            $table->string('postcode')->default('');;
            $table->string('city')->default('');;
            $table->string('state')->default('');;
            $table->string('country')->default('');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form');
    }
};
