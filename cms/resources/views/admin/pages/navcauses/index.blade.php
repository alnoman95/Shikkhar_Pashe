@extends('admin.layouts.master') 
@section('title','Nav-Causes')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All Slider
                <!-- <a class="btn btn-success btn-sm float-right mr-2" href="{{route('navcauses.create')}}">Add New</a> -->
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Post Heading</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Writer Name</th>
                                <th>Goal</th>
                                <th>Bg_Image</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($navcauses as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->post_head }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sub_title }}</td>
                                <td>{{ $item->writer }}</td>
                                <td>{{ $item->goal }}</td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/navcauses/'.$item->bg_img) }}" alt=""></td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/navcauses/'.$item->image) }}" alt=""></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('navcauses.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                    
                                    <!-- <form id="delete-form-{{ $item->id }}" action="{{ route('navcauses.destroy',$item->id) }}"  style="display: none;" method="POST">
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