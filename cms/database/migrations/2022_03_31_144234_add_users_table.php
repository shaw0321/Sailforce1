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
        Schema::table('users', function (Blueprint $table) {
            //
        // id名を変更
        $table->renameColumn('id', 'user_id');
        // roleを追加
        $table->string('role')->after('password');
        // deleted atを追加
        $table->datetime('deleted_at')->after('updated_at');
        // image_URLを追加
        $table->string('image_URL')->after('deleted_at');
        

        //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
