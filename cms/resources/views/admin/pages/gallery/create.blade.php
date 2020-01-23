@extends('admin.layouts.master') 
@section('title','Gallery Image')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege');
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Add Gallery Image
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('gallery.index')}}">View All</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <h5 class="form-desc">
                            Gallery Image
                            </h5>                          
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Gallery Image</label>
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