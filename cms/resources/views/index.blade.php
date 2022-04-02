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
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="form-group col-sm-6">
                            <input type="text" name="searchwords" class="form-control">
                    </div>
        
                    <!--　検索ボタン -->
                    <div class="form-group col-sm-offset-3 col-sm-3">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                    </div>
                </div>
            </div>
        </form>
    
    </div>


    
@endsection