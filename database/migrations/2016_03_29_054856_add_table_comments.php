<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer("comment_blog_id");
            $table->foreign("comment_blog_id")->references("blog_id")->on("blog");
            $table->timestamps();
            $table->string("comment_slug");
            $table->string("comment_content");
            $table->string("comment_created_by");            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
