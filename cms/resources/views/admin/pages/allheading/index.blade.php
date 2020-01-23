@extends('admin.layouts.master') 
@section('title','All Heading')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                All Heading
                <!-- <a class="btn btn-success btn-sm float-right mr-2" href="{{route('allheading.create')}}">Add New</a> -->
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table  width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Causes Heading</th>
                                <th>Causes Sub Heading</th>
                                <th>Events Heading</th>
                                <th>Events Sub Heading</th>
                                <th>Story Heading</th>
                                <th>Story Sub Heading</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allheading as $key=>$item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->causes_heading}}</td>
                                <td>{{$item->causes_subheading}}</td>
                                <td>{{$item->events_heading}}</td>
                                <td>{{$item->events_subheading}}</td>
                                <td>{{$item->story_heading}}</td>
                                <td>{{$item->story_subheading}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('allheading.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                    
                                    <!-- <form id="delete-form-{{ $item->id }}" action="{{ route('allheading.destroy',$item->id) }}"  style="display: none;" method="POST">
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