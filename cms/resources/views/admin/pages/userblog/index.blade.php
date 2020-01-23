@extends('admin.layouts.master') 
@section('title','UserBlog')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All User Blog
                <!-- <a class="btn btn-success btn-sm float-right mr-2" href="{{route('userblog.create')}}">Add New</a> -->
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>                              
                                <th>Title</th>
                                <th>Sub Title1</th>
                                <th>Sub Title2</th>
                                <th>Writer Name</th>
                                <th>Bg_Image</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userblog as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sub_title1 }}</td>
                                <td>{{ $item->sub_title2}}</td>
                                <td>{{ $item->writer }}</td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/userblog/'.$item->bg_img) }}" alt=""></td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/userblog/'.$item->image) }}" alt=""></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('userblog.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                    
                                    <!-- <form id="delete-form-{{ $item->id }}" action="{{ route('userblog.destroy',$item->id) }}"  style="display: none;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" title="Delete" class="btn btn-danger btn-sm mt-2" onclick="if(confirm('Are you sure? You want to delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                        }else {
                                        event.preventDefault();
                                        }"><i class="fa fa-trash"></i>
                                    </button> -->
                                </td>
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