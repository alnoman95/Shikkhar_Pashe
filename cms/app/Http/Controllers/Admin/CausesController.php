<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Causes;
use Carbon\carbon;
class CausesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causes=Causes::all();
        return view('admin.pages.causes.index',compact('causes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.causes.create');
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
            'goal' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/causes'))
            {
                mkdir('uploads/causes', 0777 , true);
            }
            $image->move('uploads/causes',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $causes= new Causes();
        $causes->title = $request->title;
        $causes->sub_title = $request->sub_title;
        $causes->goal = $request->goal;
        $causes->image = $imagename;
        $causes->save();
        Toastr::success('Causes Added!','Success');
        return redirect()->route('causes.index');
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
        $causes= Causes::findOrfail($id);
        return view('admin.pages.causes.edit',compact('causes'));
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
            'goal' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $causes= Causes::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/causes'))
            {
                mkdir('uploads/causes', 0777 , true);
            }
            $image->move('uploads/causes',$imagename);
        }else {
            $imagename = $causes->image;
        }
        $causes->title = $request->title;
        $causes->sub_title = $request->sub_title;
        $causes->goal = $request->goal;
        $causes->image = $imagename;
        $causes->save();
        Toastr::success('Causes Updated!','Success');
        return redirect()->route('causes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $causes= Causes::findOrfail($id);
        if(file_exists('uploads/causes/'.$causes->image))
        {
            unlink('uploads/causes/'.$causes->image);
        }
        $causes->delete();
        Toastr::success('Causes Succcessfully Deleted!','Success');
        return redirect()->back();
    }
}
