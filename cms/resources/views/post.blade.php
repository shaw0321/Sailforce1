@extends('layouts.app')

@section('content')


<div>{{ $post->user_id }}</div>
<a href="{{ url('user/'.$post->user_id)}}">{{ $post->user->name }}</a>

<div>{{ $post->post_title }}</div>
<div>{{ $post->post_desc }}</div>

<div>{{ $post->user_id }}</div>

<div class="body">
   @php
     $converter = new \cebe\markdown\MarkdownExtra();
     $post_body = $converter->parse($post->post_body);
   @endphp  
   {!! $post_body !!}
</div>

@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection