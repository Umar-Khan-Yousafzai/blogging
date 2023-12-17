<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            // $table->index('category_id')->unsigned();
            $table->unsignedInteger('user_id')->unsigned();
            // $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->text('title_description');
            $table->text('image');
            $table->longText('content');
            $table->string('main_tag_line');
            // $table->longText('content_2');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('slug');
            // $table->tinyInteger('feed')->nullable();
            $table->longText('tags')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
