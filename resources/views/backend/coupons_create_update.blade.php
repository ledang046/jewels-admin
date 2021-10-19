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

            <div class="row mt-3">
                <div class="col-md-1">Code</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->code) ? $record->code:'' }}" 
                        name="code" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-1">Quantiy</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->time) ? $record->time:'' }}" 
                        name="time" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-1">Condition</div>
                <div class="col-md-8">
                   <select name="condition">
                       <option value="0">Select</option>
                       <option value="1">Discount by %</option>
                       <option value="2">Discount by $</option>
                   </select>
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-md-1">Number</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->number) ? $record->number:'' }}" 
                        name="number" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>

              
            <!-- Button -->
            <div class="row mt-3">
                <div class="col-md-9"></div>
                <div class="col-md-1">
                    <a type="button" href="{{ route('coupons.index') }}" class="btn ml-3 btn_create_update">Cancel</a>
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
