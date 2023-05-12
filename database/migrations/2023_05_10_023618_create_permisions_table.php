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
        Schema::create('permision', function (Blueprint $table) {
            $table->id();
            $table->string('permision_name');
            $table->unsignedBigInteger('action_name');
            $table->foreign('action_name')->references('id')->on('actions')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('permision');
    }
};
