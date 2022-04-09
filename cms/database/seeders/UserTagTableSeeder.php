<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Tag; 

class UserTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         for ($i = 0; $i < 30; $i++){

            // postsとtagsテーブルのidカラムをランダムに並び替え、先頭の値を取得
            $set_user_id = User::select('user_id')->orderByRaw("RAND()")->first()->id;
            $set_tag_id = Tag::select('tag_id')->orderByRaw("RAND()")->first()->id;

            // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $user_tag = DB::table('user_tag')
                            ->where([
                                ['user_id', '=', $set_user_id],
                                ['tag_id', '=', $set_tag_id]
                            ])->get();

            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if($user_tag->isEmpty()){
                DB::table('user_tag')->insert(
                    [
                        'user_id' => $set_user_id,
                        'tag_id' => $set_tag_id,
                    ]
                );
            }else{
                $i--;
            }
        }


    }
}
