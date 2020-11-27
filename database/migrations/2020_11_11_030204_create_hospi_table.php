<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('establecimiento',250)->nullable();
            $table->string('encuestador',250)->nullable();
            $table->string('fecha_atencion',250)->nullable();
            $table->string('hora_inicio',250)->nullable();
            $table->string('hora_fin',250)->nullable();
            $table->string('condicion')->nullable();
            $table->string('edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estudios')->nullable();
            $table->string('seguro')->nullable();
            $table->string('tipo_usuario')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('profesional')->nullable();
            $table->string('pregunta1', 5)->nullable();
            $table->string('pregunta2', 5)->nullable();
            $table->string('pregunta3', 5)->nullable();
            $table->string('pregunta4', 5)->nullable();
            $table->string('pregunta5', 5)->nullable();
            $table->string('pregunta6', 5)->nullable();
            $table->string('pregunta7', 5)->nullable();
            $table->string('pregunta8', 5)->nullable();
            $table->string('pregunta9', 5)->nullable();
            $table->string('pregunta10',5)->nullable();
            $table->string('pregunta11',5)->nullable();
            $table->string('pregunta12',5)->nullable();
            $table->string('pregunta13',5)->nullable();
            $table->string('pregunta14',5)->nullable();
            $table->string('pregunta15',5)->nullable();
            $table->string('pregunta16',5)->nullable();
            $table->string('pregunta17',5)->nullable();
            $table->string('pregunta18',5)->nullable();
            $table->string('pregunta19',5)->nullable();
            $table->string('pregunta20',5)->nullable();
            $table->string('pregunta21',5)->nullable();
            $table->string('pregunta22',5)->nullable();
            $table->string('per_pregunta1',5)->nullable();
            $table->string('per_pregunta2',5)->nullable();
            $table->string('per_pregunta3',5)->nullable();
            $table->string('per_pregunta4',5)->nullable();
            $table->string('per_pregunta5',5)->nullable();
            $table->string('per_pregunta6',5)->nullable();
            $table->string('per_pregunta7',5)->nullable();
            $table->string('per_pregunta8',5)->nullable();
            $table->string('per_pregunta9',5)->nullable();
            $table->string('per_pregunta10',5)->nullable();
            $table->string('per_pregunta11',5)->nullable();
            $table->string('per_pregunta12',5)->nullable();
            $table->string('per_pregunta13',5)->nullable();
            $table->string('per_pregunta14',5)->nullable();
            $table->string('per_pregunta15',5)->nullable();
            $table->string('per_pregunta16',5)->nullable();
            $table->string('per_pregunta17',5)->nullable();
            $table->string('per_pregunta18',5)->nullable();
            $table->string('per_pregunta19',5)->nullable();
            $table->string('per_pregunta20',5)->nullable();
            $table->string('per_pregunta21',5)->nullable();
            $table->string('per_pregunta22',5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospi');
    }
}
