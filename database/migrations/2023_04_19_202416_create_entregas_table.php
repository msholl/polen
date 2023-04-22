<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 128);
            $table->string('endereco', 128)->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro', 128);
            $table->string('complemento', 128)->nullable();
            $table->integer('ordem')->nullable();
            $table->boolean('entregue')->default(false);
            $table->date('data')->nullable();
            $table->dateTime('data_entrega')->nullable();
            $table->string('entregador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
