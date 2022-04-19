<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\Tag::factory(50)->create();
        
 
        $data = [
            [
            'tag_name' => '新規事業'
            ],
            [
            'tag_name' => '財務'
            ],
                        [
            'tag_name' => 'システム開発'
            ],
                        [
            'tag_name' => 'プロダクト開発'
            ],
                        [
            'tag_name' => 'チームマネジメント'
            ],
                        [
            'tag_name' => '会計'
            ],
                        [
            'tag_name' => '市場調査'
            ],
                        [
            'tag_name' => 'ファンド'
            ],
                        [
            'tag_name' => 'トレーディング'
            ],
                        [
            'tag_name' => '事業投資'
            ],
                        [
            'tag_name' => 'ヘルスケア'
            ],
                        [
            'tag_name' => 'エネルギー'
            ],
                        [
            'tag_name' => '税務'
            ],
                        [
            'tag_name' => '法務'
            ],
                        [
            'tag_name' => 'プロジェクトマネジメント'
            ],
                        [
            'tag_name' => '経費処理'
            ],
                        [
            'tag_name' => '人事'
            ],
                        [
            'tag_name' => '採用'
            ],
                        [
            'tag_name' => '兼務'
            ],
                        [
            'tag_name' => '英語'
            ],
                        [
            'tag_name' => '会議設計'
            ],
                        [
            'tag_name' => '契約事務'
            ],
                        [
            'tag_name' => '収益モデル'
            ],
                        [
            'tag_name' => '業務効率化'
            ],
                        [
            'tag_name' => 'RPA'
            ],
                        [
            'tag_name' => 'マーケティング'
            ],
                        [
            'tag_name' => '発注業務'
            ],
                        [
            'tag_name' => '決済'
            ],
                        [
            'tag_name' => '経営企画'
            ],
                        [
            'tag_name' => '育児休暇'
            ],
                        [
            'tag_name' => 'データ分析'
            ],
                        [
            'tag_name' => 'IPO'
            ],
                        [
            'tag_name' => '内部統制'
            ],
                        [
            'tag_name' => 'MIL'
            ],
            
        ];

        DB::table('tags')->insert($data);
        

    

    }
}
      