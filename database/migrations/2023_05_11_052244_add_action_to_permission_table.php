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
        Schema::table('permissions', function (Blueprint $table) {
            // $table->unsignedBigInteger('action_name');
            // $table->foreign('action_name')->references('id')->on('actions')->onDelete('cascade')->onUpdate('cascade');
            // $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            // $table->dropColumn('action_name')->default(1);
            // $table->dropColumn('description');
        });
    }
};
