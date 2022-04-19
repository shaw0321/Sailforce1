<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        //   \App\Models\Post::factory(100)->create();
        
        //          $data = [ 
        //      [
        //     'post_title' => '市場調査委託で必要なドキュメント一覧',
        //     'post_status' =>'1',
        //     'user_id' => function(){
        //         return User::all() ->random()->user_id;
        //     }
        //     ],
        //                  [
        //     'post_title' => 'GCEO対話ってなんでやってるの？',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '新規事業開発のための専門人材採用',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => 'MC社員が自分でプロトタイプ作って提案してみた',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '気軽に仕事でプロトタイプを作るために部でcloud9の契約をした',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => 'docusighを導入するときの壁と乗り越え方',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '頑なにteamsを使わない人への説得方法',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '事業企画フェーズのプロジェクトKPI設計のイロハ',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '過去の事例からわかる、上が求める事業企画レポートの要件５選',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '経費精算が出張費、交際費、交通費でやり方が違う理由',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => '今噂のサイボウズ Kintoneを部に導入してみた',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //                  [
        //     'post_title' => 'PCが苦手な私がMIL（プログラム）研修に参加してみた',
        //     'post_status' =>'1',
        //     'user_id' => User::all() ->random()->user_id,
        //     ],
        //     //
        // ];
        // DB::table('posts')->insert($data);

       
    }
}

