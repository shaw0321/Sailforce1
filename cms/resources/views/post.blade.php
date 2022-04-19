@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col card justify-content-center">
            <div>投稿者:<a href="{{ url('user/'.$post->user_id)}}">{{ $post->user->name }}</a></div>
            <div>作成日:<span>{{ $post->created_at }} </span></div>
            <h1 class="fw-bold">{{ $post->post_title }}</h1>
            @if($post->user_id == Auth::id())
                    <form action="{{ url('post/'.$post->post_id) }}" method="DELETE" class="form-horizontal">
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                         削除
                        </button>
                    </form>
            
            @endif
          
            
            
            <div class="body mt-1">
               @php
                 $converter = new \cebe\markdown\MarkdownExtra();
                 $post_body = $converter->parse($post->post_body);
               @endphp  
               {!! $post_body !!}
            </div>
        
        </div>
        <div class="col-2"></div>
        
        
    </div>
</div>


@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection