<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('post_tag_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            
            //Laravelは複合主キーが扱いにくいのでユニークで代用
            $table->unique(['post_id', 'tag_id'],'uq_roles'); 
            
            //外部キー制約
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade'); 
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade'); 

        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};
