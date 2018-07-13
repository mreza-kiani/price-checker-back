<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('telegram_name')->nullable();
            $table->integer('telegram_chat_id')->unique()->nullable();
            $table->string('telegram_type')->nullable();
            $table->string('telegram_username')->unique()->nullable();

            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
