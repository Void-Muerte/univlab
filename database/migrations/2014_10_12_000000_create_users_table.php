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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable();
    $table->unsignedBigInteger('speciality_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('username', 50)->unique();
            $table->string('password')->unique()->nullable()->default('00000000');
            $table->integer('inscription_number')->nullable()->unique();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
