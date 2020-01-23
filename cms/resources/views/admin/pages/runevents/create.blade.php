@extends('admin.layouts.master') 
@section('title','Running Events Create')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege');
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Add New Running Events
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('runevents.index')}}">View All</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('runevents.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h5 class="form-desc">
                            Running Events
                            </h5>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Heading</label>
                                <div class="col-sm-7">
                                    <input class="form-control" placeholder="Enter heading" type="text" name="heading">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">BG_Image</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="file" name="bg_img">
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