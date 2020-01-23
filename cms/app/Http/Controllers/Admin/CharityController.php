<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Charity;
use Carbon\Carbon;
class CharityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charity=Charity::all();
        return view('admin.pages.charity.index',compact('charity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.charity.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'about' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/charity'))
            {
                mkdir('uploads/charity', 0777 , true);
            }
            $image->move('uploads/charity',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $charity= new Charity();
        $charity->title=$request->title;
        $charity->sub_title=$request->sub_title;
        $charity->about=$request->about;
        $charity->image=$imagename;
        $charity->save();
        Toastr::success('Charity Added!','Success');
        return redirect()->route('charity.index');
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
        $charity=Charity::findOrfail($id);
        return view('admin.pages.charity.edit',compact('charity'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'about' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $charity=Charity::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/charity'))
            {
                mkdir('uploads/charity', 0777 , true);
            }
            $image->move('uploads/charity',$imagename);
        }else {
            $imagename = $charity->image;
        }  
        $charity->title=$request->title;
        $charity->sub_title=$request->sub_title;
        $charity->about=$request->about;
        $charity->image=$imagename;
        $charity->save();
        Toastr::success('Charity Updated!','Success');
        return redirect()->route('charity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charity=Charity::findOrfail($id);
        if(file_exists('uploads/charity/'.$charity->image))
        {
            unlink('uploads/charity/'.$charity->image);
        }
        $charity->delete();
        Toastr::success('Charity Succcessfully Deleted!','Success');
        return redirect()->back();
    }
}
