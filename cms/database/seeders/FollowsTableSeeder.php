<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User; 

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        //
         for ($i = 0; $i < 1000; $i++){

            // postsとtagsテーブルのidカラムをランダムに並び替え、先頭の値を取得
            $set_following_id = User::select('user_id')->orderByRaw("RAND()")->first()->user_id;
            $set_followed_id = User::select('user_id')->orderByRaw("RAND()")->first()->user_id;

            // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $follow = DB::table('follows')
                            ->where([
                                ['following_id', '=', $set_following_id],
                                ['followed_id', '=', $set_followed_id]
                            ])->get();

            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if($follow->isEmpty() && $set_following_id !== $set_followed_id){
                DB::table('follows')->insert(
                    [
                        'following_id' => $set_following_id,
                        'followed_id' => $set_followed_id,
                    ]
                );
            }else{
                $i--;
            }
        }
    }
}
