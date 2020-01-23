@extends('admin.layouts.master') 
@section('title','Footer Edit')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.messege')
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Edit Footer
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{route('footer.index')}}">View All</a>
                    </h6>
                    <div class="element-box">
                        <form action="{{route('footer.update',$footer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <h5 class="form-desc">
                            Footer
                            </h5>                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label offset-md-1">Blog</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4" name="blog">{{$footer->blog}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Email</label>
                                <div class="col-sm-7">
                                    <input class="form-control" value="{{$footer->email}}" type="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Phone</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="phone" value="{{$footer->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 offset-md-1" for="">Location</label>
                                <div class="col-sm-7">
                                    <input class="form-control"  type="text" name="location" value="{{$footer->location}}">
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