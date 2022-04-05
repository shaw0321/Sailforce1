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
        Schema::create('user_tag', function (Blueprint $table) {
            $table->increments('user_tag_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tag_id');
            
            //Laravelは複合主キーが扱いにくいのでユニークで代用
            $table->unique(['user_id', 'tag_id'],'uq_roles'); 
            
            //外部キー制約
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('user_tag');
    }
};
