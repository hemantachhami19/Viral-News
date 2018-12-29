<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("post_id");
            $table->foreign('post_id')->references('id')->on('posts')->onDelete("cascade");
            $table->unsignedInteger("user_id")->nullable();
            $table->string("commenter_name")->nullable()->comment("if not logged in");
            $table->text("comment")->comment("the comment body");
            $table->boolean("approved")->default(true);
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
        Schema::dropIfExists('comments');
    }
}
