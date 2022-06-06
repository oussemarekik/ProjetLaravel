<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voiteurneufs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prix');
            $table->string('caracterstique');
            $table->string('garantie');
            $table->string('energie');
            $table->string('boite');
            $table->unsignedBigInteger('marqueId');
            $table->foreign('marqueId')->references('id')->on('marques')->onDelete('RESTRICT ')->onUpdate('RESTRICT ');
            $table->unsignedBigInteger('carrosseriesId');
            $table->foreign('carrosseriesId')->references('id')->on('carrosseries')->onDelete('RESTRICT ')->onUpdate('RESTRICT ');
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
        Schema::dropIfExists('voiteurneufs');
    }
};
