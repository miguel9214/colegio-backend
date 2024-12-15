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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hours');
            $table->string('grade');
               // Añadir las columnas created_by_user y updated_by_user
               $table->unsignedBigInteger('created_by_user')->nullable();
               $table->unsignedBigInteger('updated_by_user')->nullable();
  
               // Añadir las llaves foráneas
               $table->foreign('created_by_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
               $table->foreign('updated_by_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
