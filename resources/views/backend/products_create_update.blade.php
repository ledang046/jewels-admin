@extends("layouts.layout")

@section("do-du-lieu")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/product.css') }}">
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Products</h1>
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

            <!-- Content -->
            <div class="row mt-3">
                <div class="col-md-1">Content</div>
                <div class="col-md-8">
                    <input type="text" 
                        value="{{ isset($record->content) ? $record->content:'' }}" 
                        name="content" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>
            <!-- End Content -->

            <!-- Status & Price & Hot -->
            <div class="row mt-3">
                <div class="col-md-1">Price</div>
                <div class="col-md-3">
                    <input type="text" 
                        value="{{ isset($record->price) ? $record->price:'' }}" 
                        name="price" 
                        class="form-control" 
                        required
                    >
                </div>
                <div class="col-md-1 mt-1">Status</div>
                <div class="col-md-1 mt-1">
                    <input type="checkbox" 
                        class="form-check-input" 
                        name="status"
                        @if(isset($record->status))
                            @if($record->status == 1)
                                checked
                            @endif
                        @endif
                    >
                </div>
                <div class="col-md-1 mt-1">Hot</div>
                <div class="col-md-1 mt-1">
                    <input type="checkbox" 
                        class="form-check-input" 
                        name="hot"
                        @if(isset($record->hot))
                            @if($record->hot == 1)
                                checked
                            @endif
                        @endif
                    >
                </div>
                
            </div>
            <!-- End Status & Price & Hot -->

            <!-- Discount -->
            <div class="row mt-3">
                <div class="col-md-1">Discount</div>
                <div class="col-md-7">
                <input type="text" 
                        value="{{ isset($record->discount) ? $record->discount:'' }}" 
                        name="discount" 
                        class="form-control" 
                        required
                    >
                </div>
            </div>
            <!-- End discount -->

            <!-- Category_id -->
            <div class="row" style="margin-top:20px;">
                <div class="col-md-1">Category</div>
                <div class="col-md-7">
                    <select name="category_id" class="form-control" required>
                        <option selected hidden value="{{ isset($record->category_id) }}">
                            {{ isset($record->category_id) ? $record->category->name : '' }}
                        </option>
                        <option value="1">Necklace</option>
                        <option value="2">Bracelet</option>
                        <option value="3">Ring</option>
                        <option value="4">Earrings</option>
                        <option value="5">Anklet</option>
                    </select>
                </div>
            </div>
            <!-- End category_id -->

            <!-- upload Image -->
            <div class="row mt-3">
                <div class="col-md-1">Upload image</div>
                <div class="col-md-7">
                    <input type="file" name="photo">
                </div>
             </div>
            <!-- end  -->

            <!-- Created & updated -->
            @if(isset($record))
            <div class="row mt-3">
                <div class="col-md-1">Created</div>
                <div class="col-md-4">
                    <input type="datetime-local" 
                        value="{{ isset($record->created_at) ? date('Y-m-d\TH:i:s', strtotime($record->created_at)) : '' }}" 
                        name="created_at" 
                        class="form-control" 
                        
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
