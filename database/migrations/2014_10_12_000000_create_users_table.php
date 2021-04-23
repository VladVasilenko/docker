<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->BigInteger('social_id');
            $table->unsignedSmallInteger('social_type')->comment('Локальный id соц.сети');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->dateTime('register_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
