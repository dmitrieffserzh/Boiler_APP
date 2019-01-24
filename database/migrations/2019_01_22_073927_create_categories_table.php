<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('color')->default('#007bff');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('categories');
    }
}
