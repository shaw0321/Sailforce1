<!-- resources/views/posts.blade.php -->
@extends('layouts.app')
@section('content')

<div class="card-body">
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 検索フォーム -->
        <form action="{{ url('searchresult') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 入力フォーム -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 h3 text-center mb-3 font-weight-bold">
                        Sail Force
                    </div>
                    <div class="form-group col-sm-6">
                            <input type="text" name="searchwords" class="form-control" value="{{ $searchwords }} ">
                    </div>
        
                    <!--　登録ボタン -->
                    <div class="form-group col-sm-offset-3 col-sm-3">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                    </div>
                </div>
            </div>
        </form>
  </div>
 <!-- 全ての投稿リスト -->
    <div class="row mb-2">
        <div class="col-md-6">

            @if($posts->count() > 0)
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                      <strong class="d-inline-block mb-2 text-primary">#新規事業#1年目#まず初めに　</strong>
                      <h3 class="mb-0">
                        <a class="text-dark" href="{{ url('post/1') }}">一年目からできる新規事業</a>
                      </h3>
                      <div class="mb-1 text-muted">2022年1月11日</div>
                      <p class="card-text mb-auto">通常業務も始めたばかりなのに急に企画を任された。そんなあなたにむけた〜〜〜</p>
                    </div>
                  </div>
                @foreach ($posts as $post)
                  <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                      <strong class="d-inline-block mb-2 text-primary">#新規事業#1年目#まず初めに　</strong>
                      <h3 class="mb-0">
                        <a class="text-dark" href="{{ url('post/'.$post->post_id ) }}">{{ $post->post_title }}</a>
                      </h3>
                      <div class="mb-1 text-muted">{{ $post->user->name }}  {{ $post->created_at }}  </div>
                      <p class="card-text mb-auto">{{ $post->post_desc }}</p>
                    </div>
                  </div>
              @endforeach
             @endif
        </div>
    
        <div class="col-md-6">

            @if($users->count() > 0)
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2 text-success">＃医療　＃治験　＃キャッシュレス　＃新規事業</strong>
                  <h3 class="mb-0">
                    <a class="text-dark" href="{{ url('user/1') }}">池辺　将</a>
                  </h3>
                  <div class="mb-1 text-muted">コンシューマー産業G ヘルスケア本部</div>
                  <p class="card-text mb-auto">フォロワー100人　フォロー200人.</p>
                      <button type="submit" class="btn btn-primary">contact</button>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f98726357%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f98726357%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 250px;">
            </div>
            @foreach ($users as $user)
              <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  @if($user->tags->count() > 0)
                  <div class="container">
                    <div class="row">
                        @foreach ($user->tags as $tag)
                        <span class="d-inline-block mb-2 text-success col-sm-2">＃.{{$tag->tag_name}}</span>
                        @endforeach
                    </div>
                    </div>
                  @endif
                  <h3 class="mb-0">
                    <a class="text-dark" href="{{ url('user/'.$user->user_id) }}">{{ $user->name}}</a>
                  </h3>
                  <div class="mb-1 text-muted">コンシューマー産業G ヘルスケア本部</div>
                  <p class="card-text mb-auto">フォロワー{{ $user->followed->count()}}人　フォロー{{ $user->following->count()}}人</p>
                      <button type="submit" class="btn btn-primary">contact</button>
                      @if(Auth::check())
                       <input data-id="{{ $user->user_id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="follow" data-off="folowing" checked >
                      
                      @endif
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f98726357%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f98726357%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 250px;">
                </div>
            @endforeach
         @endif
        </div>
    </div>
@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

@endsection