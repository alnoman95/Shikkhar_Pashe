@extends('admin.layouts.master') 
@section('title','User')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All User List
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table text-center table-bordered table-striped table-lightfont">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Post</th>                               
                                <th>Class</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key=>$item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->post}}</td>
                                <td>{{$item->class}}</td>
                                <td>{{$item->address}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection