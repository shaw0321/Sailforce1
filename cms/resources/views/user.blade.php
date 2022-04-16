@extends('layouts.app')

@section('content')

<div>{{ $user->user_id }}</div>
<div>{{ $user->name }}</div>

 <p class="card-text mb-auto">フォロワー{{ $user->followed->count()}}人　フォロー{{ $user->following->count()}}人</p>

                      @if(Auth::check())
                       <input data-id="{{ $user->user_id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="outline-light" data-toggle="toggle" data-on="follow中" data-off="followする" {{ Auth::user()->following->contains($user) ?  'checked' : ''}} >
                      
                      @endif


<div>{{ $user->role }}</div>


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
                  </div>

@endforeach




@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection