@extends('admin.layouts.master') 
@section('title','Nav-Causes Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege');
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Edit Nav-Causes
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('navcauses.index')}}">View List</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('navcauses.update',$navcauses->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <h5 class="form-desc">
                                 Nav-Causes
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Heading</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$navcauses->heading}}" type="text" name="heading">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Post Heading</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$navcauses->post_head}}" type="text" name="post_head">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Title</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$navcauses->title}}" type="text" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label offset-md-1">Sub Title</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4" name="sub_title">{{$navcauses->sub_title}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Writer Name</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="writer" value="{{$navcauses->writer}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Goal</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="goal" value="{{$navcauses->goal}}">
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