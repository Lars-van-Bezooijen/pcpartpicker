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
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')
                ->references('id')
                ->on('cpu_manufacturers');
            $table->foreignId('serie_id')
                ->references('id')
                ->on('cpu_series');
            $table->foreignId('socket_id')
                ->references('id')
                ->on('cpu_sockets');
            $table->string('name');
            $table->string('image');
            $table->double('price');
            $table->integer('core_count');
            $table->float('core_clock');
            $table->float('boost_clock')
                ->nullable();
            $table->integer('tdp')->nullable();
            $table->boolean('smt')->nullable();
            $table->boolean('has_cooler');
            $table->boolean('integrated_graphics');
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
        Schema::dropIfExists('cpus');
    }
};
