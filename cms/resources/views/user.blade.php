@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
            <div class="col-4 card">

                <h1 class="text-center mt-5">{{ $user->name }}</h1>
                <p class="card-text  text-center mt-5">フォロワー{{ $user->followed->count()}}人　フォロー{{ $user->following->count()}}人</p>
  
                @if(false)
                       <input data-id="{{ $user->user_id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="outline-light" data-toggle="toggle" data-on="follow中" data-off="followする" {{ Auth::user()->following->contains($user) ?  'checked' : ''}} >
                @endif

            </div>
            <div class="col-8">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        投稿済み:{{ $user->posts->count()}}件
                    </div>
 
                  </div>
                @foreach($user->posts as $post)
                  <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                     @if($post->tags->count() > 0)
                  <div class="container">
                      <div class="row">
                        @foreach ($post->tags as $tag)
                        <a class="d-inline-flex col-2 mb-2 text-success fw-bold fs-6" href="{{ url('tagsearch/'. $tag->tag_id)}}">＃{{$tag->tag_name}}</a>
                        @endforeach
                       </div>
                   </div>
                  @endif
                      <h3 class="mb-0">
                        <a class="text-dark" href="{{ url('post/'.$post->post_id ) }}">{{ $post->post_title }}</a>
                      </h3>
                      <div class="mb-1 text-muted">{{ $post->user->name }}  {{ $post->created_at }}  </div>
                      <p class="card-text mb-auto">{{ $post->post_desc }}</p>
                    </div>
                    @if($post->user_id == Auth::id())
                        <form action="{{ url('post/'.$post->post_id) }}" method="post" class="form-horizontal">
                            @method("PUT")
                              {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">
                             編集
                            </button>
                        </form>
                        <form action="{{ url('post/'.$post->post_id) }}" method="post" class="form-horizontal">
                              @method("DELETE")
                              {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">
                             削除
                            </button>
                        </form>
                    @endif
                  </div>
                @endforeach
            </div>
    </div>
    </div>
</div>


@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection