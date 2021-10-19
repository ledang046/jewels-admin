@extends("layouts.layout")
@section("do-du-lieu")
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Customuser Management</strong>
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
                                                    <option value="{{url('admin/paginateCustomuser/3')}}">3</option>
                                                    <option value="{{url('admin/paginateCustomuser/6')}}">6</option>
                                                    <option value="{{url('admin/paginateCustomuser/9')}}">9</option>
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
                                            <th class="js-sort-string">Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach($data as $rows)
                                        <tr>
                                            <td>{{$rows->id}}</td> 
                                            <td>{{$rows->name}}</td>
                                            <td>{{$rows->email}}</td>
                                            <td>{{$rows->address}}</td>
                                            <td>{{$rows->phonenumber}}</td> 
                                            <td>@if($rows->username == "")
                                                <span class="badge badge-danger">Unregistered</span>
                                                @else
                                                <span class="badge badge-success">Registered</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form style="display:inline;" action="{{ url('admin/customusers/'.$rows->id) }}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                                                @csrf @method("DELETE")
                                                
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