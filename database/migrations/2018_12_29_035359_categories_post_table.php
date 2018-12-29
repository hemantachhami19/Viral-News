<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("post_id");
            $table->foreign('post_id')->references('id')->on('posts')->onDelete("cascade");
            $table->unsignedInteger("category_id");
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_posts');

    }
}
