@extends("layouts.layout")
@section("do-du-lieu")
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Users Management</strong>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div style="display:flexbox;" class="dataTables_length" id="bootstrap-data-table_length">
                                        <label class="mt-4 d-flex">
                                            <span class="mt-1">Entries: </span> &nbsp;
                                            <form id="selectbox" name="" >
                                                @method("POST")
                                                @csrf
                                                <select aria-controls="bootstrap-data-table" class="form-control form-control-sm"  style="width:100px;" name="bootstrap-data-table_length" onchange="javascript:location.href = this.value;">
                                                    <option>Select</option>
                                                    <option value="{{url('admin/paginateUser/1')}}">1</option>
                                                    <option value="{{url('admin/paginateUser/3')}}">3</option>
                                                    <option value="{{url('admin/paginateUser/5')}}">5</option>
                                                </select>
                                            </form>
            
                                         </label>
                                    </div>
                                </div>
                                    <div  class="col-sm-12 col-md-6">
                                        <div id="bootstrap-data-table_filter" class="dataTables_filter float-right">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table">
                                            </label>
                                            </div>
                                    </div>
                            </div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered js-sort-table">
                                    <thead>
                                        <tr>
                                            <th class="js-sort-number">Id</th>
                                            <th class=""><div class="round-img">Avatar</div></th>
                                            <th class="js-sort-string">Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th></th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach($data as $rows)
                                        <tr>
                                            <td>{{$rows->id}}</td>
                                            <td><img class="rounded-circle" src="{{asset('upload/users/'.$rows->photo)}}" alt="null"></td>
                                            <td>{{$rows->name}}</td>
                                            <td>{{$rows->email}}</td>
                                            <td>{{$rows->address}}</td>
                                            <td>{{$rows->phone}}</td> 
                                            <td>@if($rows->gender == 1)
                                                Male
                                                @else
                                                Female
                                                @endif
                                            </td>
                                            <td>
                                                <form style="display:inline;" action="{{ url('admin/users/'.$rows->id) }}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                                                @csrf @method("DELETE")
                                                <a class="badge badge-complete" style="color:black;" href="{{ url('admin/users/'.$rows->id.'/edit') }}">
                                                <i class="fas fa-pencil-alt"></i></a>
                                                <button style="color:black;border:none;cursor: pointer;background: none;" class="badge badge-complete" type="submit">
                                                <i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                      {{ $data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection