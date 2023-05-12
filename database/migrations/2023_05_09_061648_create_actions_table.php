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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('action_name');
            $table->unsignedBigInteger('system_name');
            $table->foreign('system_name')->references('id')->on('module')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description')->nullable();
            $table->string('route');
            $table->string('function')->nullable();
            $table->string('ordering');
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
        Schema::dropIfExists('actions');
    }
};
