<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Post; 
use App\Models\Tag; 

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                 for ($i = 0; $i < 100; $i++){

            // postsとtagsテーブルのidカラムをランダムに並び替え、先頭の値を取得
            $set_post_id = Post::select('post_id')->orderByRaw("RAND()")->first()->post_id;
            $set_tag_id = Tag::select('tag_id')->orderByRaw("RAND()")->first()->tag_id;

            // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $post_tag = DB::table('post_tag')
                            ->where([
                                ['post_id', '=', $set_post_id],
                                ['tag_id', '=', $set_tag_id]
                            ])->get();

            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if($post_tag->isEmpty()){
                DB::table('post_tag')->insert(
                    [
                        'post_id' => $set_post_id,
                        'tag_id' => $set_tag_id,
                    ]
                );
            }else{
                $i--;
            }
        }
    }
}



