@extends('admin.layouts.master') 
@section('title','Home') 
@section('content')
<style>
.icon{
    font-size:45px;
}
.icon:hover{
    color:#047bf8;
}
</style>
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-content">
                        <div class="row">
                            <div class="col-sm-4 text-center col-xxxl-3">
                                <a class="element-box el-tablo" href="{{route('usershow.index')}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="label">
                                                Total User
                                            </div>
                                            <div class="value">
                                                {{$total['user']}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 text-center col-xxxl-3">
                                <a class="element-box el-tablo" href="{{route('usershow.index')}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="label">
                                                Total Students
                                            </div>
                                            <div class="value">
                                                {{$total['student']}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 text-center col-xxxl-3">
                                <a class="element-box el-tablo" href="{{route('usershow.index')}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="label">
                                                Total Volunteers
                                            </div>
                                            <div class="value">
                                                {{$total['volunteers']}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 text-center col-xxxl-3">
                                <a class="element-box el-tablo" href="{{route('usershow.index')}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="label">
                                            Total Donar
                                            </div>
                                            <div class="value">
                                                {{$total['donar']}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 text-center col-xxxl-3">
                                <a class="element-box el-tablo" href="{{route('donte.index')}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon">
                                                <i class="fa fa-money"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="label">
                                                Total Donation
                                            </div>
                                            <div class="value">
                                                {{$donate}} $
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection