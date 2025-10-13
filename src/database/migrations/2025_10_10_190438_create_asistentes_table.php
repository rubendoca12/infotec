<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono')->nullable(); // Teléfono puede ser opcional
            
            // Clave foránea que referencia a la tabla 'eventos'
            $table->foreignId('evento_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('asistentes');
    }
};
