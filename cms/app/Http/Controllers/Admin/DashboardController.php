<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Donate;
use App\User;
class DashboardController extends Controller
{
    public function index()
    {   
        $total=array();
        $donate= Donate::all()->sum('taka');
        $total['user']= User::all()->count();
        $total['donar']= User::where('post', '=' ,'donar')->count();
        $total['volunteers']= User::where('post', '=' ,'volunteer')->count();
        $total['student']= User::where('post', '=' ,'student')->count();
        return view('admin.layouts.home',compact('donate','total'));
    }
}
