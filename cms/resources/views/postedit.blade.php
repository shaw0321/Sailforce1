@extends('layouts.app')

@section('content')

<div >
    <form action="{{ url('post/'.$post->post_id) }}" method="POST" class="form-horizontal">
         @method("patch")
         {{ csrf_field() }}

    
        <div class="container">
          <div class="row">
                <div class="form-group col-sm-12 card">
                     <label for="post_title">Post title</label>
                     <input type="text" id="post_title" name="post_title" class="form-control"　placeholder="POSTのタイトル" value="{{$post->post_title}}">
                     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 card">
                   <label for="tags">Tag</label>
                   <input type="text"  id="tags" name="tags" class="form-control"　placeholder="POSTのタグ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 card">
                   <label for="post_desc">Post desc</label>
                   <input type="text" id="post_desc" name="post_desc" class="form-control"　value="{{$post->post_desc}}">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6 card">
                   <label for="post_body">post body</label>
                   <textarea id="post_body" name="post_body" class="form-control  me-2"　rows="10">{{$post->post_body}}</textarea>
                </div>
                
                <div class="form-group col-sm-6 card">
                    <label for="preview">preview</label>
                    <div class="body" id="preview"></div>

                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-3">
                    <button type="submit" class="btn btn-primary">
                        投稿
                    </button>
                </div>
            </div>
         </div>

        
    </form>
    
</div>

@endsection