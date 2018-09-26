<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('slug');
            $table->text('summary')->nullable();
            $table->text('details');
            $table->boolean('status');
            $table->boolean('is_draft')->default(1);
            $table->boolean('is_posted')->default(0);
            $table->timestamp('submitted_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('published_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('main_image')->nullable();
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
        Schema::dropIfExists('posts');
    }
}