@extends('admin.layouts.master') 
@section('title','Upcoming Events')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All Upcoming Events
                <!-- <a class="btn btn-success btn-sm float-right mr-2" href="{{route('upcoming.create')}}">Add New</a> -->
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Bg_Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcoming as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sub_title }}</td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/upcoming/'.$item->bg_img) }}" alt=""></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('upcoming.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>                                   
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