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
            $table->string('slug',700)->unique();;
            $table->text('summary')->nullable();
            $table->text('details')->nullable();
            $table->boolean('status');
            $table->timestamp('submitted_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('published_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('user_id')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->string('image_medium')->nullable();
            $table->string('image_large')->nullable();
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
