<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\About;
use Carbon\Carbon;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        return view('admin.pages.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.create');
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
            'sub_heading' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'bg_img' => 'required|mimes:jpeg,jpg,bmp,png',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('uploads/about'))
                {
                    mkdir('uploads/about', 0777 , true);
                }
                $image->move('uploads/about',$imagename);
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
                if (!file_exists('uploads/about'))
                {
                    mkdir('uploads/about', 0777 , true);
                }
                $bg_img->move('uploads/about',$bgimagename);
            }else {
                $bgimagename = 'dafault.png';
            }
        $about= new About();
        $about->heading = $request->heading;
        $about->sub_heading = $request->sub_heading;
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->bg_img = $bgimagename;
        $about->image = $imagename;
        $about->save();
        Toastr::success('About Added!','Success');
        return redirect()->route('about.index');
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
        $about= About::findOrfail($id);
        return view('admin.pages.about.edit',compact('about'));
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
            'sub_heading' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'bg_img' => 'mimes:jpeg,jpg,bmp,png',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $about= About::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('uploads/about'))
                {
                    mkdir('uploads/about', 0777 , true);
                }
                $image->move('uploads/about',$imagename);
            }else {
                $imagename = $about->image;
            }
        // bg_image
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
            {
                $currentDate = Carbon::now()->toDateString();
                $bgimagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
                if (!file_exists('uploads/about'))
                {
                    mkdir('uploads/about', 0777 , true);
                }
                $bg_img->move('uploads/about',$bgimagename);
            }else {
                $bgimagename = $about->bg_img;
            }    
        $about->heading = $request->heading;
        $about->sub_heading = $request->sub_heading;
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->bg_img = $bgimagename;
        $about->image = $imagename;
        $about->save();
        Toastr::success('About Updated!','Success');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about= About::findOrfail($id);
        if(file_exists('uploads/about/'.$about->image) && file_exists('uploads/about/'.$about->bg_img))
        {
            unlink('uploads/about/'.$about->image);
            unlink('uploads/about/'.$about->bg_img);
        }
        $about->delete();
        Toastr::success('About successfully Deleted!','Success');
        return redirect()->back();
    }
}
