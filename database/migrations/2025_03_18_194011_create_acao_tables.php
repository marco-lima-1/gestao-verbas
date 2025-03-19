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
        Schema::create('tipo_acao', function (Blueprint $table) {
            $table->id('codigo_acao');
            $table->string('nome_acao',100)->unique();
            $table->timestamps();
        });

        Schema::create('acao', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('codigo_acao');
            $table->foreign('codigo_acao')->references('codigo_acao')->on('tipo_acao')->onDelete('cascade');
            $table->double('investimento');
            $table->date('data_prevista');
            $table->date( 'data_cadastro')->default(now());;
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acao');
        Schema::dropIfExists('tipo_acao');
    }
};
