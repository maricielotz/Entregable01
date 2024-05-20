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

 Schema::create('reservaciones', function (Blueprint $table) {
  $table->integer('nro_reservacion');
  $table->integer('nro_promocion')->unique();
  $table->string('cliente_dni', 20);
  $table->foreign('cliente_dni')->references('dni')->on('clientes')->onDelete('cascade');
  $table->timestamps();

 });

 }

 /**
 * Reverse the migrations.
 */

 public function down(): void
 {
 Schema::dropIfExists('reservaciones');
 }
};
