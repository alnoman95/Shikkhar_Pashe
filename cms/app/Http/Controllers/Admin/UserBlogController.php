<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\UserBlog;
use Carbon\carbon;
class UserBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userblog=UserBlog::all();
        return view('admin.pages.userblog.index',compact('userblog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.userblog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'heading' => 'required',
            'writer' => 'required',
            'sub_title1' => 'required',
            'title' => 'required',
            'sub_title2' => 'required',
            'bg_img' => 'required|mimes:jpeg,jpg,bmp,png',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('uploads/userblog'))
                {
                    mkdir('uploads/userblog', 0777 , true);
                }
                $image->move('uploads/userblog',$imagename);
            }else {
                $imagename = 'dafault.png';
            }
        // bg_image
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
            {
                $currentDate = Carbon::now()->toDateString();
                $bgimagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
                if (!file_exists('uploads/userblog'))
                {
                    mkdir('uploads/userblog', 0777 , true);
                }
                $bg_img->move('uploads/userblog',$bgimagename);
            }else {
                $bgimagename = 'dafault.png';
            }
        $userblog= new UserBlog();
        $userblog->heading = $request->heading;
        $userblog->sub_title1 = $request->sub_title1;
        $userblog->writer = $request->writer;
        $userblog->title = $request->title;
        $userblog->sub_title2 = $request->sub_title2;
        $userblog->bg_img = $bgimagename;
        $userblog->image = $imagename;
        $userblog->save();
        Toastr::success('Userblog Added!','Success');
        return redirect()->route('userblog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userblog=UserBlog::findOrfail($id);
        return view('admin.pages.userblog.edit',compact('userblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'heading' => 'required',
            'writer' => 'required',
            'sub_title1' => 'required',
            'title' => 'required',
            'sub_title2' => 'required',
            'bg_img' => 'mimes:jpeg,jpg,bmp,png',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $userblog=UserBlog::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('uploads/userblog'))
                {
                    mkdir('uploads/userblog', 0777 , true);
                }
                $image->move('uploads/userblog',$imagename);
            }else {
                $imagename = $userblog->image;
            }
        // bg_image
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
            {
                $currentDate = Carbon::now()->toDateString();
                $bgimagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
                if (!file_exists('uploads/userblog'))
                {
                    mkdir('uploads/userblog', 0777 , true);
                }
                $bg_img->move('uploads/userblog',$bgimagename);
            }else {
                $bgimagename = $userblog->bg_img;
            }
        $userblog->heading = $request->heading;
        $userblog->sub_title1 = $request->sub_title1;
        $userblog->writer = $request->writer;
        $userblog->title = $request->title;
        $userblog->sub_title2 = $request->sub_title2;
        $userblog->bg_img = $bgimagename;
        $userblog->image = $imagename;
        $userblog->save();
        Toastr::success('Userblog Updated!','Success');
        return redirect()->route('userblog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
