@extends('layouts.app')

@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        
        <h1 class="h1 text-center mb-3 font-weight-bold">Sail Force</h1>

        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        
        <!-- 検索フォーム -->
        <form action="{{ url('searchresult') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 入力フォーム -->
            <div class="container w">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-4 ">
                            <input type="text" name="searchwords" class="form-control">
                            <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                    </div>

                </div>
            </div>
        </form>
    
    </div>
    
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
                        <a class="text-dark" href="{{ url('post/1') }}">池辺　将</a>
                      </h3>
                  <div class="mb-1 text-muted">コンシューマー産業G ヘルスケア本部</div>
                  <p class="card-text mb-auto">フォロワー100人　フォロー200人.</p>
                    </div>
                  </div>
            @foreach ($users as $user)
              <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  @if($user->tags->count() > 0)
    
                        @foreach ($user->tags as $tag)
                        <a class="d-inline-flex mb-2 text-success" href="{{ url('tagsearch/'. $tag->tag_id)}}">＃{{$tag->tag_name}}</a>
                        @endforeach
                        
      
                  @endif
                  <h3 class="mb-0">
                    <a class="text-dark" href="{{ url('user/'.$user->user_id) }}">{{ $user->name}}</a>
                  </h3>
                  <div class="mb-1 text-muted">コンシューマー産業G ヘルスケア本部</div>
                  <p class="card-text mb-auto">フォロワー{{ $user->followed->count()}}人　フォロー{{ $user->following->count()}}人</p>
                      @if(false)
                       <input data-id="{{ $user->user_id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="outline-light" data-toggle="toggle" data-on="follow中" data-off="followする" {{ Auth::user()->following->contains($user) ?  'checked' : ''}} >
                      
                      @endif
                </div>
              </div>
            @endforeach


            
         @endif
        </div>
    </div>

        

@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection