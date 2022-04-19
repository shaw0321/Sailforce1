@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
            <div class="col-4 card">

                <h1>{{ $user->name }}</h1>
                <p class="card-text mb-auto">フォロワー{{ $user->followed->count()}}人　フォロー{{ $user->following->count()}}人</p>
                <p class="card-text mb-auto">投稿数{{ $user->posts->count()}}件　</p>
                @if(false)
                       <input data-id="{{ $user->user_id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="outline-light" data-toggle="toggle" data-on="follow中" data-off="followする" {{ Auth::user()->following->contains($user) ?  'checked' : ''}} >
                @endif

            </div>
            <div class="col-8">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        投稿済み
                    </div>
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"　aria-current="page" href="#">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"　href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"　href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled"data-toggle="tab"　 href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>
                  </div>
                @foreach($user->posts as $post)
                  <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                      <strong class="d-inline-block mb-2 text-primary">#新規事業#1年目#まず初めに　</strong>
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