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
    Schema::create('clientes', function (Blueprint $table) {
      $table->string('dni', 20)->primary(); 
      $table->string('nombres', 100); 
      $table->string('apellido_paterno', 100); 
      $table->string('apellido_materno', 100); 
      $table->string('direccion ', 255); 
      $table->string('ciudad ', 100);  
      $table->timestamps();  
    });
  }

  /**
   * Reverse the migrations.
   */

  public function down(): void
  {
    Schema::dropIfExists('clientes');
  }
};
