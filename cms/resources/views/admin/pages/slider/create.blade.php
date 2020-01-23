@extends('admin.layouts.master') 
@section('title','Slider Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Add New Slider
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('slider.index')}}">View All</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h5 class="form-desc">
                                 slider
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Title</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter Title" type="text" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label offset-md-1">Sub Title</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4" name="info" placeholder="Enter Sub Title"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Button Name</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="button" placeholder="Enter Button Name">
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