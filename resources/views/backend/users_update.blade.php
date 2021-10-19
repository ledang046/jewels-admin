@extends("layouts.layout")

@section("do-du-lieu")
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading"><h4>Edit user</h4></div>
        <div class="panel-body">
        <form method="post" action="{{ url('admin/users/'.$record->id) }}" enctype="multipart/form-data">
              @method('PUT')
            @csrf
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10">
                    <input type="email" value="{{ isset($record->email)?$record->email:'' }}" @if(isset($record->email)) disabled @endif name="email" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Password</div>
                <div class="col-md-10">
                <input type="password" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" @else required @endif class="form-control">
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Address</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($record->address)?$record->address:'' }}" name="address" class="form-control" required>
                </div>
            </div>
             <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Phone</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($record->phone)?$record->phone:'' }}" name="phone" class="form-control" required>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Gender</div>
                <div class="col-md-10">
                <input type="checkbox" @if(isset($record->gender)&&$record->gender==1) checked @endif name="gender" id="gender"> <label for="gender">Gender</label>
                 (If Male check the box , if not uncheck it)
                </div>
            </div>

            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Role</div>
                <div class="col-md-10">
                    <select name="role" class="form-control" required>
                        <option  selected hidden value="{{ isset($record->role)?$record->role:'' }}">@if($record->role == 1) Admin 
                                @elseif ($record->role == 2) Manager
                                @else Staff
                                @endif 
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Staff</option>
                    </select>
                </div>
            </div>

              <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
             </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
    @include('backend.form-error')
</div>
@endsection("do-du-lieu")