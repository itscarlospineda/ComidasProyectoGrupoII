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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->unsignedBigInteger("dish_id");
            $table->string("dish_name");
            $table->decimal("dish_price",8,2);
            $table->integer("quantity");
            $table->decimal("dish_total",8,2);
            $table->enum('status', ['pendiente', 'completado', 'cancelado'])->default('pendiente');
            $table->text("comments")->nullable();
            $table->timestamp("Fecha_pedido");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
