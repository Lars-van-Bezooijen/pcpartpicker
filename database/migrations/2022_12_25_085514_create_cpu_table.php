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
        Schema::create('cpu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')
                ->references('id')
                ->on('cpu_manufacturer');
            $table->foreignId('series_id')
                ->references('id')
                ->on('cpu_series');
            $table->foreignId('integrated_graphics_id')
                ->references('id')
                ->on('cpu_integrated_graphics');
            $table->foreignId('socket_id')
                ->references('id')
                ->on('cpu_sockets');
            $table->string('name');
            $table->double('price');
            $table->integer('core_count');
            $table->float('core_clock');
            $table->float('boost_clock');
            $table->integer('tdp');
            $table->boolean('smt');
            $table->boolean('has_cooler');
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
        Schema::dropIfExists('cpu');
    }
};
