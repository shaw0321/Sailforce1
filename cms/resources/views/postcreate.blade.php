@extends('layouts.app')

@section('content')

<div class="card-body">
    <form action="{{ url('post') }}" method="POST" class="form-horizontal">
         {{ csrf_field() }}
         <div class="container">
            <div class="row">
                <div class="form-group col-sm-12">
                   <input type="text" name="post_title" class="form-control"　placeholder="POSTのタイトル">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                   <input type="text" name="tags" class="form-control"　placeholder="POSTのタグ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <input type="textarea" name="post_body" class="form-control"　placeholder="POSTの本文">
                </div>
                <div class="form-group col-sm-6">
                   preview
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