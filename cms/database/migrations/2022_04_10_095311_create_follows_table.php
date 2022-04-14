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
        Schema::create('follows', function (Blueprint $table) {
            $table->id('follow_id');
            $table->unsignedBigInteger('following_id');
            $table->unsignedBigInteger('followed_id');
              $table->timestamps();
            
            //Laravelは複合主キーが扱いにくいのでユニークで代用
            $table->unique(['following_id', 'followed_id'],'uq_roles'); 
            
            //外部キー制約
            $table->foreign('following_id')->references('user_id')->on('users')->onDelete('cascade'); 
            $table->foreign('followed_id')->references('user_id')->on('users')->onDelete('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
