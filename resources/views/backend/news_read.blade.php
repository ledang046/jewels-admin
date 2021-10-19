<?php use App\Models\News; ?>
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
                                        <strong class="card-title">News Management</strong>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a class="btn-add py-1 px-3" href="{{ route('news.create') }}">
                                            <i class="fas fa-plus"></i> Create
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                    <div  class="col-sm-12 col-md-6 ">
                                        <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                            <form method="get" action="{{route('cate.search')}}"> 
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
                                            <th class="js-sort-number">Title</th>
                                            <th class="js-sort-string">Images</th>
                                            <th></th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach($data as $rows)
                                        <tr>
                                            @php
                                            $images = explode('|',$rows->photo);
                                            @endphp
                                            <td>{{$rows->title}}</td>
                                            <td>
                                            @foreach($images as $item)
                                            <img width="70%" height="60px" src="{{URL::to($item)}}">
                                            @endforeach
                                            <td>
                                            <td>
                                                <form style="display:inline;" action="{{ url('admin/news/'.$rows->id) }}" onsubmit="return confirm('Are you sure you want to delete?');" method="POST">
                                                @csrf @method("DELETE")
                                                <a class="badge badge-complete" style="color:black;" href="{{ url('admin/news/'.$rows->id.'/edit') }}">
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
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection