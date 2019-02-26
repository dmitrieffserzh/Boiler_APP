<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersOauthTable extends Migration {

    public function up() {
        Schema::create('users_oauth', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->string('provider', 32);
            $table->string('provider_id');
            $table->string('token')->nullable();
            $table->timestamps();
            $table->unique('user_id');
        });
    }

    public function down() {
        Schema::dropIfExists('users_oauth');
    }
}