<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointDeVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_de_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('longitude');
            $table->string('latitude');
            $table->foreignId('region_id')->constrained('regions')->cascadeOnDelete();
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
        Schema::dropIfExists('point_de_ventes');
    }
}
