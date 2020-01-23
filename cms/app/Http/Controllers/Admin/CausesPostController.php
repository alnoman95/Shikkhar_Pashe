<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\CausesPost;
use Carbon\Carbon;
class CausesPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causespost=CausesPost::all();
        {
            return view('admin.pages.causespost.index',compact('causespost'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.causespost.create');
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
            'writer' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/causespost'))
            {
                mkdir('uploads/causespost', 0777 , true);
            }
            $image->move('uploads/causespost',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $causespost= new CausesPost();
        $causespost->title = $request->title;
        $causespost->writer = $request->writer;
        $causespost->image = $imagename;
        $causespost->save();
        Toastr::success('Causespost Added!','Success');
        return redirect()->route('causespost.index');
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
        $causespost= CausesPost::findOrfail($id);
        return view('admin.pages.causespost.edit',compact('causespost'));
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
            'writer' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $causespost= CausesPost::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/causespost'))
            {
                mkdir('uploads/causespost', 0777 , true);
            }
            $image->move('uploads/causespost',$imagename);
        }else {
            $imagename = $causespost->image;
        }
        
        $causespost->title = $request->title;
        $causespost->writer = $request->writer;
        $causespost->image = $imagename;
        $causespost->save();
        Toastr::success('Causespost updated!','Success');
        return redirect()->route('causespost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $causespost= Causes::findOrfail($id);
        if(file_exists('uploads/causespost/'.$causespost->image))
        {
            unlink('uploads/causespostpost/'.$causespost->image);
        }
        $causespost->delete();
        Toastr::success('Causes Succcessfully Deleted!','Success');
        return redirect()->back();
    }
}
