@extends("layouts.layout")
@section("do-du-lieu")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/product.css') }}">
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong class="card-title">Products Management</strong>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a class="btn-add py-1 px-3" href="{{ route('products.create') }}">
                                            <i class="fas fa-plus"></i> Create
                                        </a>
                                    </div>
                                </div>
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
                                                    <option value="{{url('admin/paginateProduct/3')}}">3</option>
                                                    <option value="{{url('admin/paginateProduct/6')}}">6</option>
                                                    <option value="{{url('admin/paginateProduct/9')}}">9</option>
                                                </select>
                                            </form>
                                           
                                         </label>
                                    </div>
                                </div>
                                    <div  class="col-sm-12 col-md-6">
                                        <div id="bootstrap-data-table_filter " class="dataTables_filter float-right">
                                        <form class="mt-4" method="get" action="{{route('products.search')}}"> 
                                            <label class="d-flex">
                                                <input  type="search" placeholder="Search" name="key" class="form-control form-control-sm search" placeholder="" aria-controls="bootstrap-data-table">
                                                <button id="search-btn" class="fas fa-search" type="submit"></button>
                                            </label>
                                            <form>
                                            </div>
                                    </div>
                            </div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered table-dark js-sort-table">
                                    <thead>
                                        <tr>
                                            <th class="js-sort-number">Id</th>
                                            <th style="width: 120px;">Image</div></th>
                                            <th class="js-sort-string">Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Hot</th>
                                            <th></th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach($data as $rows)
                                        <tr>
                                            <td>{{$rows->id}}</td>
                                            <td><img class="img-product" src="{{asset('upload/products/'.$rows->photo)}}" alt="null"></td>
                                            <td>{{$rows->name}}</td>
                                            <td>{{$rows->category->name}}</td>
                                            <td>{{$rows->description}}</td>
                                            <td>@if($rows->hot == 1)
                                                <i class="fas fa-check ml-3" style="color:green"></i>
                                                @else
                                                <i class="fas fa-times ml-3" style="color:red"></i>
                                                @endif
                                            </td> 
                                            <td>
                                                <form style="display:inline;" action="{{ url('admin/products/'.$rows->id) }}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                                                     @csrf @method("DELETE")                                       
                                                    <button type="button" style="color:green;border:none;cursor: pointer;background: none;" class="badge badge-complete" data-toggle="modal" data-target="#largeModal{{ $rows->id }}">
                                                    <i class="fas fa-eye"></i></a></button>
                                                    <!-- Modal detail product  -->   
                                                    <div class="modal fade" id="largeModal{{ $rows->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div style="color:black;" class="modal-header">
                                                                    <h5 style="font-size: 30px;font-weight: bold;" id="largeModalLabel">Product Detail</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="color: black;" class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <div class="project-info-box mt-0">
                                                                                    <h5>{{$rows->name}}</h5>
                                                                                    <p class="mb-0">{{$rows->description}}</p>
                                                                                </div><!-- / project-info-box -->

                                                                                <div class="project-info-box">                                                                        
                                                                                    <p><b>Content:</b>{{$rows->description}}</p>
                                                                                    <p><b>Hot:</b>@if($rows->hot == 1)
                                                                                        <i class="fas fa-check ml-3" style="color:green"></i>
                                                                                        @else
                                                                                        <i class="fas fa-times ml-3" style="color:red"></i>
                                                                                        @endif
                                                                                    </p>
                                                                                    <p><b>Status:</b>@if($rows->status == 1)
                                                                                        Now available
                                                                                        @else
                                                                                        Not available
                                                                                        @endif</p>
                                                                                    <p><b>Discount:</b>{{$rows->discount}}%</p>
                                                                                    <p class="mb-0"><b>Price:</b> ${{$rows->price}}</p>
                                                                                </div>
                                                                            </div><!-- / column -->

                                                                            <div class="col-md-7">
                                                                                <img style="width:70%;" src="{{asset('upload/products/'.$rows->photo)}}" alt="project-image" class="rounded ml-5">
                                                                                <div class="project-info-box">
                                                                                    <p><b>Categories:</b>{{$rows->category->name}}</p>
                                                                                    <p><b>Created_at:</b>{{$rows->created_at}}</p>
                                                                                    <p><b>Updated_at:</b>{{$rows->updated_at}}</p>
                                                                                </div><!-- / project-info-box -->
                                                                            </div><!-- / column -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                    <a class="badge badge-complete" style="color:yellow;" href="{{ url('admin/products/'.$rows->id.'/edit') }}">
                                                    <i class="fas fa-pencil-alt"></i></a>
                                                    <button style="color:red;border:none;cursor: pointer;background: none;" class="badge badge-complete" type="submit">
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

        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/product.css') }}">


@endsection