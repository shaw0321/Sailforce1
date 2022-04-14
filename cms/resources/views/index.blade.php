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
            <div class="container w">
                <div class="row justify-content-center">
                    <div class="input-group col-sm-4 ">
                            <input type="text" name="searchwords" class="form-control">
                            <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                    </div>

                </div>
            </div>
        </form>
    
    </div>
 <input data-id="1" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="follow" data-off="folowing" checked >
 <input data-id="2" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ 1 ? 'checked' : '' }}>


@push('js')
    <script src="{{ asset('js/toggle.js') }}"></script>
@endpush

    
@endsection