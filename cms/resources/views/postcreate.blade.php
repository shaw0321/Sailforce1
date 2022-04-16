@extends('layouts.app')

@section('content')

<div class="card-body">
    <form action="{{ url('post') }}" method="POST" class="form-horizontal">
         {{ csrf_field() }}
         <div class="container">
             
  
            <div class="row">
                <div class="form-group col-sm-12">
                     <label for="post_title">Post title</label>
                     <input type="text" id="post_title" name="post_title" class="form-control"　placeholder="POSTのタイトル">
                     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                   <label for="tags">Tag</label>
                   <input type="text"  id="tags" name="tags" class="form-control"　placeholder="POSTのタグ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                   <label for="post_desc">Post desc</label>
                   <input type="text" id="post_desc" name="post_desc" class="form-control"　placeholder="POSTのタグ">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6">
                   <label for="post_body">post body</label>
                   <textarea id="post_body" name="post_body" class="form-control"　rows="10"></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <div class="body" id="preview">
                        preview

                    </div>

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