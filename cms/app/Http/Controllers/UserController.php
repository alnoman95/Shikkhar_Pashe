<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Admin\Slider;
use App\Admin\Charity;
use App\Admin\Causes;
use App\Admin\Volunteer;
use App\Admin\Events;
use App\Admin\Story;
use App\Admin\AllHeading;
use App\Admin\About;
use App\Admin\NavCauses;
use App\Admin\CausesPost;
use App\Admin\RunningEvents;
use App\Admin\UpcomingEvents;
use App\Admin\UpcomingContent;
use Carbon\Carbon;
use App\Admin\Donate;
use App\Admin\Reply;
use App\Admin\UserBlog;
use App\Admin\Gallery;
use App\User;
class UserController extends Controller
{
    public function index()
    {  
        $donate= Donate::all()->sum('taka');
        $donar= User::where('post', '=' ,'donar')->count();
        $volunteers= User::where('post', '=' ,'volunteer')->count();
        $student= User::where('post', '=' ,'student')->count();
        $slider= Slider::all();
        $charity=Charity::all()->where('id','=',1)->first();
        $causes= Causes::all();
        $volunteer=Volunteer::all()->where('id','=',1)->first();
        $events=Events::all();
        $story=Story::all();
        $allheading=AllHeading::all()->where('id','=',1)->first();
        return view('user.layouts.home',compact('slider','charity','causes','volunteer','events','story','allheading','donate','donar','student','volunteers'));
    }
    public function about()
    {
        $about= About::all()->where('id','=',1)->first();
        return view('user.pages.about.index',compact('about'));
    }
    public function navcauses()
    {
        $causes= Causes::all();
        $navcauses=NavCauses::all()->where('id','=',1)->first();
        $causespost= CausesPost::all();
        return view('user.pages.causes.index',compact('causes','navcauses','causespost'));
    }
    public function causesgallary()
    {
        $gallery = Gallery::latest()->paginate(9);
        return view('user.pages.causes.gallary',compact('gallery'));
    }

    public function running()
    {
        $allheading=AllHeading::all()->where('id','=',1)->first();
        $events=Events::all();
        $runevents=RunningEvents::all()->where('id','=',1)->first();
        return view('user.pages.events.running',compact('allheading','events','runevents'));
    }
    public function upcoming()
    {
        $upcoming=UpcomingEvents::all()->where('id','=',1)->first();
        $upcomcontent=UpcomingContent::all();
        return view('user.pages.events.upcoming',compact('upcoming','upcomcontent'));
    }
    public function studentblog()
    {
        $story=Story::all();
        $allheading=AllHeading::all()->where('id','=',1)->first();
        return view('user.pages.blog.student',compact('story','allheading'));
    }
    public function userblog()
    {
        $causespost= CausesPost::all();
        $reply = Reply::latest()->paginate(3);
        $userblog=UserBlog::all()->where('id','=',1)->first();
        return view('user.pages.blog.user',compact('causespost','reply','userblog'));
    }
    public function contact()
    {
        $causespost= CausesPost::all();
        return view('user.pages.contact.index',compact('causespost'));
    }
    public function doner()
    {
        return view('user.pages.donate.index');
    }
    // public function footer()
    // {
    //     $footer=Footer::all()->where('id','=',1)->first();
    //     return view('user.partials.footer',compact('footer'));
    // }
}
