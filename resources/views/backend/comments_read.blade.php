@extends("layouts.layout")
@section("do-du-lieu")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/category.css') }}">
<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong class="card-title">Comments Management</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <div class="notify-comment"></div>
                            <div class="row">
                                    <div  class="col-sm-12 col-md-6 ">
                                        <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                            <form method="get" action=""> 
                                            <label class="d-flex">
                                                <input type="search" placeholder="Search" name="key" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table">
                                                <button id="search-btn" class="fas fa-search" type="submit"></button>
                                            </label>
                                            <form>
                                        </div>
                                    </div>
                            </div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered js-sort-table">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th class="js-sort-number">Id</th>
                                            <th class="js-sort-string">Name</th>
                                            <th>Product</th>
                                            <th class="js-sort-string">Comment</th>
                                            <th>Reply</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $rows)
                                        @if($rows->name != "Admin")
                                        <tr>
                                            <td>
                                                @if($rows->display == 1)
                                                    <a class="badge badge-success">Approved</a>
                                                @else
                                                    <a href="{{ url('admin/change-comment-status/'.$rows->id) }}" class="badge badge-danger">Pending</a>
                                                @endif
                                            </td>
                                            <td>{{$rows->id}}</td>
                                            <td>{{$rows->name}}</td>
                                            <td>{{$rows->product->name}}</td>
                                            <td>{{$rows->comment}}
                                                @if($rows->display == 1)
                                                <br>
                                                </br><textarea class="form-control reply_comment_{{$rows->id}}"  rows="3" placeholder="reply comment..."></textarea> 
                                                </br><button class="btn btn-primary btn-reply-comment" data-product_id="{{$rows->product_id}}" data-comment_id="{{$rows->id}}">Reply</button>
                                                @else
                                                @endif       
                                            </td>
                                            <td style="width:180px;">
                                                
                                                @foreach($data as $key => $cmt)
                                                @if($cmt->reply_comment_id == $rows->id)
                                                 Admin: {{$cmt->comment}}</br>
                                                @else
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{$rows->date}}</td>
                                            <td>
                                                <form style="display:inline;" action="{{ url('admin/commments/'.$rows->id) }}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                                                @csrf @method("DELETE")
                                                <button style="color:black;border:none;cursor: pointer;background: none;" class="badge badge-complete" type="submit">
                                                <i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                       @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                   
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection