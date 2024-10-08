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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id('id_shoe');
            $table->string('shoe_name', length:100);
            $table->string('thumbnail', length:255)->nullable();
            $table->string('description', length:255);
            $table->integer('price');
            $table->integer('view');
            $table->string('specification', length:255);

            // Khóa ngoại
            $table->bigInteger('brand_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
