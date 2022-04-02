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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('post_title');
            $table->string('post_desc')->nullable();
            $table->string('post_body')->nullable();
	        $table->integer('user_id');
            $table->string('post_status');
            $table->string('featured_image')->nullable();
            $table->string('featured_image_caption')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
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
};
