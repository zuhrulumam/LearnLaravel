<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategoryRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("category_relation", function(Blueprint $table){
            $table->integer("relation_blog_id");
            $table->foreign("relation_blog_id")->references("blog_id")->on("blog");
            $table->integer("relation_category_id");
            $table->foreign("relation_category_id")->references("category_id")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("category_relation");
    }
}
