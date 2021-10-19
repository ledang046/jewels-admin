@extends("layouts.layout")

@section("do-du-lieu")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/category.css') }}">
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>News</h1>
        </div>
        <div class="panel-body">
        <form method="post" action="{{ $action }}" enctype="multipart/form-data">
            @csrf
            @if(isset($record))
                @method('PUT')
            @endif
            <!-- Title -->
            <div class="row mt-3">
                <div class="col-md-2">Title</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->title) ? $record->title:'' }}" 
                        name="title" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>
             <!-- Title end -->
            <div class="row mt-3">
                <div class="col-md-2">Upload images</div>
                <div class="col-md-8">
                    @if(isset($record->photo))
                    <input  type="file"  name="image[]" multiple >
                    @else
                    <input type="file"  name="image[]" multiple >
                    @endif
                </div>
            </div>
              
            <!-- Button -->
            <div class="row mt-3">
                <div class="col-md-9"></div>
                <div class="col-md-1">
                    <a type="button" href="{{ route('news.index') }}" class="btn ml-3 btn_create_update">Cancel</a>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn ml-3 btn_create_update">Save</button>
                </div>
            </div>
            <!-- Button end -->
        </form>
        </div>
    </div>
</div>
@endsection("do-du-lieu")
