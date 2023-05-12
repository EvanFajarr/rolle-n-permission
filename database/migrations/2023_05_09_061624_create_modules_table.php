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
        Schema::create('module', function (Blueprint $table) {
            $table->id();
            $table->string('modul_name');
            $table->unsignedBigInteger('system_name');
            $table->foreign('system_name')->references('id')->on('system')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description');
            $table->string('ordering');
            $table->string('file_name')->nullable();
            $table->string('class_name')->nullable();
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
        Schema::dropIfExists('module');
    }
};
