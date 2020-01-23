<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\NavCauses;
use Carbon\Carbon;
class NavCausesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navcauses=NavCauses::all();
        return view('admin.pages.navcauses.index',compact('navcauses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.navcauses.create');
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
            'post_head' => 'required',
            'title' => 'required',
            'goal' => 'required',
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
                if (!file_exists('uploads/navcauses'))
                {
                    mkdir('uploads/navcauses', 0777 , true);
                }
                $image->move('uploads/navcauses',$imagename);
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
                if (!file_exists('uploads/navcauses'))
                {
                    mkdir('uploads/navcauses', 0777 , true);
                }
                $bg_img->move('uploads/navcauses',$bgimagename);
            }else {
                $bgimagename = 'dafault.png';
            }
        $navcauses= new NavCauses();
        $navcauses->heading = $request->heading;
        $navcauses->post_head = $request->post_head;
        $navcauses->writer = $request->writer;
        $navcauses->goal = $request->goal;
        $navcauses->title = $request->title;
        $navcauses->sub_title = $request->sub_title;
        $navcauses->bg_img = $bgimagename;
        $navcauses->image = $imagename;
        $navcauses->save();
        Toastr::success('Nav-Causes Added!','Success');
        return redirect()->route('navcauses.index');
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
        $navcauses= NavCauses::findOrfail($id);
        return view('admin.pages.navcauses.edit',compact('navcauses'));
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
            'post_head' => 'required',
            'writer' => 'required',
            'title' => 'required',
            'goal' => 'required',
            'sub_title' => 'required',
            'bg_img' => 'mimes:jpeg,jpg,bmp,png',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $navcauses= NavCauses::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                if (!file_exists('uploads/navcauses'))
                {
                    mkdir('uploads/navcauses', 0777 , true);
                }
                $image->move('uploads/navcauses',$imagename);
            }else {
                $imagename = $navcauses->image;
            }
        // bg_image
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
            {
                $currentDate = Carbon::now()->toDateString();
                $bgimagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
                if (!file_exists('uploads/navcauses'))
                {
                    mkdir('uploads/navcauses', 0777 , true);
                }
                $bg_img->move('uploads/navcauses',$bgimagename);
            }else {
                $bgimagename = $navcauses->bg_img;
            }
        
        $navcauses->heading = $request->heading;
        $navcauses->post_head = $request->post_head;
        $navcauses->writer = $request->writer;
        $navcauses->goal = $request->goal;
        $navcauses->title = $request->title;
        $navcauses->sub_title = $request->sub_title;
        $navcauses->bg_img = $bgimagename;
        $navcauses->image = $imagename;
        $navcauses->save();
        Toastr::success('Nav-Causes Updated!','Success');
        return redirect()->route('navcauses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $navcauses= NavCauses::findOrfail($id);
        if(file_exists('uploads/navcauses/'.$navcauses->image) && file_exists('uploads/navcauses/'.$navcauses->bg_img))
        {
            unlink('uploads/navcauses/'.$navcauses->image);
            unlink('uploads/navcauses/'.$navcauses->bg_img);
        }
        $navcauses->delete();
        Toastr::success('Causes Succcessfully Deleted!','Success');
        return redirect()->back();   
    }
}
