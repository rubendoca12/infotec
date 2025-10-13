<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('ponentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('biografia');
            $table->string('especialidad');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('ponentes');
    }
};
