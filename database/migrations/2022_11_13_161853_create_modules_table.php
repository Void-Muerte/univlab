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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('levels_id')->nullable();
            $table->unsignedBigInteger('speclalities_id')->nullable();
            $table->string('module_name')->nullable();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null')->onUpdate("cascade");
            $table->foreign('levels_id')->references('id')->on('levels')->onDelete('set null')->onUpdate("cascade");
            $table->foreign('speclalities_id')->references('id')->on('specialities')->onDelete('set null')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
