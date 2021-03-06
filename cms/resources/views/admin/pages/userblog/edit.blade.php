@extends('admin.layouts.master') 
@section('title','userblog Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege');
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Edit userblog
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('userblog.index')}}">View List</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('userblog.update',$userblog->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <h5 class="form-desc">
                                 userblog
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Heading</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$userblog->heading}}" type="text" name="heading">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Title</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$userblog->title}}" type="text" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">1st Sub Title</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4" name="sub_title1">{{$userblog->sub_title1}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label offset-md-1">2nd Sub Title</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4" name="sub_title2">{{$userblog->sub_title2}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Writer Name</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="writer" value="{{$userblog->writer}}">
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Bg_Image</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="file" name="bg_img">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Image</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="file" name="image">
                                </div>
                            </div>
                            <div class="form-buttons-w text-center">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    