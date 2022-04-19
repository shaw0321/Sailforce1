<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
            return view('index');
        }
        $users = $userquery->get();
        $posts = $postquery->get();
// ->join('users', 'users.user_id', '=', 'posts.user_id')
        //
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
        return view('postcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_body' => 'required|max:10000',
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        // post登録処理
        //以下に登録処理を記述（Eloquentモデル）
        $posts = new Post;
        $posts->post_title = $request->post_title;
        $posts->post_desc = $request->post_desc;
        $posts->post_body = $request->post_body;
        $posts->post_status = 1;
        $posts->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $posts->save();
        
        //  return redirect('/');
        
         return view('post', ['post' => $posts]);
        
    }
    
    
    public function like(Request $request)
    {
        dd($request->data);
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
        
        $post=Post::find($id);
        
        return view('post', ['post' => $post]);
        
        
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
        $post = Post::find($id);
        
        return view('postedit', ['post' => $post]);
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
  
        //バリデーション 
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_body' => 'required|max:10000',
        ]);
        
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        // post登録処理
        //以下に登録処理を記述（Eloquentモデル）
        $post = Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_desc = $request->post_desc;
        $post->post_body = $request->post_body;
        $post->post_status = 1;
        $post->save();
        
        //  return redirect('/');
        
         return view('post', ['post' => $post]);
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
        $post = Post::find($id);
        $post-> delete();
        $user = Auth::user();
        
        return view('user', ['user' => $user]);
    }
    
}