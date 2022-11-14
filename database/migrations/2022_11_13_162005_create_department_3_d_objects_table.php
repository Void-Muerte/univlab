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
        Schema::create('department_3_d_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->unsignedBigInteger('3dObject_id')->nullable();
            //to do $table->string('name');
            //to do $table->string('path');
            $table->timestamps();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete("set null")->onUpdate("cascade");
            $table->foreign('3dObject_id')->references('id')->on('3dObjects')->onDelete("set null")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_3_d_objects');
    }
};
