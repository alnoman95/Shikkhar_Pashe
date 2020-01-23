@extends('admin.layouts.master') 
@section('title','Charity')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                Charity
                <!-- <a class="btn btn-success btn-sm float-right mr-2" href="{{route('charity.create')}}">Add New</a> -->
            </h6>
            <div class="element-box">
                <div class="table-responsive">
                    <table  width="100%" class="table table-bordered table-striped table-lightfont">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>About</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($charity as $key=>$item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->sub_title}}</td>
                                <td>{{$item->about}}</td>
                                <td style="width:100px;"><img class="img-thumbnail" src="{{ asset('uploads/charity/'.$item->image) }}" alt=""></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{route('charity.edit',$item->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                    
                                    <!-- <form id="delete-form-{{ $item->id }}" action="{{ route('charity.destroy',$item->id) }}"  style="display: none;" method="POST">
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