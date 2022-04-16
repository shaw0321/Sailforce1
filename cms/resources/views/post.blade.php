@extends('layouts.app')

@section('content')


<div>{{ $post->user_id }}</div>
<a href="{{ url('user/'.$post->user_id)}}">{{ $post->user->name }}</a>

<div>{{ $post->post_title }}</div>
<div>{{ $post->post_desc }}</div>

<div>{{ $post->user_id }}</div>


@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection