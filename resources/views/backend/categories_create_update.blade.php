@extends("layouts.layout")

@section("do-du-lieu")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/category.css') }}">
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Categories</h1>
        </div>
        <div class="panel-body">
        <form method="post" action="{{ $action }}" enctype="multipart/form-data">
            @csrf
            @if(isset($record))
                @method('PUT')
            @endif
            <!-- Name -->
            <div class="row mt-3">
                <div class="col-md-1">Name</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->name) ? $record->name:'' }}" 
                        name="name" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>
            <!-- Name end -->

    
            <!-- Description -->
            <div class="row mt-3">
                <div class="col-md-1">Descript</div>
                <div class="col-md-7">
                    <textarea class="form-control" name ="description" rows="4">
                    {{ isset($record->description) ? trim($record->description) : '' }}
                    </textarea>
                </div>
            </div>
            <!-- Description end -->

            <!-- Created & updated -->
            @if(isset($record))
            <div class="row mt-3">
                <div class="col-md-1">Created</div>
                <div class="col-md-4">
                    <input type="datetime-local" 
                        value="{{ isset($record->created_at) ? date('Y-m-d\TH:i:s', strtotime($record->created_at)) : '' }}" 
                        name="created_at" 
                        class="form-control" 
                        required
                    >
                </div>
                <div class="col-md-1 ml-2">Updated</div>
                <div class="col-md-4">
                    <input type="datetime-local" value="{{ isset($record->updated_at) ? date('Y-m-d\TH:i:s', strtotime($record->updated_at)) : '' }}" name="updated_at" class="form-control" disabled>
                </div>
            </div>
            @endif
            <!-- Created & updated end -->
              
            <!-- Button -->
            <div class="row mt-3">
                <div class="col-md-9"></div>
                <div class="col-md-1">
                    <a type="button" href="{{ route('categories.index') }}" class="btn ml-3 btn_create_update">Cancel</a>
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
