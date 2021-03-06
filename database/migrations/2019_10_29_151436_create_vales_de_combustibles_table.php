<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesDeCombustiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vales_de_combustibles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_vale', 100);
            $table->date('fecha_entrega');
            $table->string('placa_id',100);
            $table->string('tipo_combustible', 191);
            $table->bigInteger('cantidad');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vales_de_combustibles');
    }
}
