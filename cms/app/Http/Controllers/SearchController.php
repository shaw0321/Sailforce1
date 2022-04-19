<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use App\Models\Tag;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userquery = User::inRandomOrder()->take(10);
        $postquery = Post::inRandomOrder()->take(10);

        $users = $userquery->get();
        $posts = $postquery->get();
// ->join('users', 'users.user_id', '=', 'posts.user_id')
        //
        return view('index' ,['posts' => $posts, 'users' => $users ]);
   
    }

    public function normal(Request $request)
    {
        $searchwords = $request->searchwords ;



               // もし検索フォームにキーワードが入力されたら
        if ($searchwords !== null) {
            
            // クエリビルダ
            $userquery = User::query();
            $postquery = Post::query();


            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($searchwords, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $userquery->where('name', 'like', '%'.$value.'%');
                $postquery->where('post_title', 'like', '%'.$value.'%');
   
            };
        }else{
            $userquery = User::inRandomOrder()->take(10);
            $postquery = Post::inRandomOrder()->take(10);
        }

        $users = $userquery->get();
        $posts = $postquery->get();
// ->join('users', 'users.user_id', '=', 'posts.user_id')
        //
        return view('searchresult' ,['posts' => $posts, 'users' => $users ,'searchwords' => $searchwords ]);
    }


    public function tag($id)
    {
        //
        dd( Tag::find($id)->tags);
        $users = Tag::find($id)->tag_user->get();
        $post ="";
        
        $searchwords = Tag::find($id)->tag_name;
        
        return view('searchresult' ,['posts' => $posts, 'users' => $users ,'searchwords' => $searchwords ]);
        
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
