<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);

        return view('user',['user' => $user]);
        
        
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
    
     public function follow(Request $request)
    {
        $attributes = $request->only(['status', 'followed_id']);
        $following_id = Auth::id();

        
                    // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
            $isFollow = DB::table('follows')
                            ->where([
                                ['following_id', '=', $following_id ],
                                ['followed_id', '=', $attributes['followed_id'] ]
                            ])->get();
            // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
            if($isFollow->isEmpty()){
                DB::table('follows')->insert(
                    [
                        'following_id' => $following_id,
                        'followed_id' => $attributes['followed_id']
                    ]
                );
                
          }else{
            // フォロー解除する時の処理
            $delete = DB::table('follows')->where('follow_id',$isFollow[0]->follow_id)->delete();
            
        
        }
            return response('OK', 200);
    }

}
