<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsershowController extends Controller
{
    public function index()
    {
        $user=User::all();
        return view('admin.pages.usershow.index',compact('user'));
    }
}
