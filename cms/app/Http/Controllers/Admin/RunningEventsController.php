<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\RunningEvents;
use Carbon\Carbon;
class RunningEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runevents=RunningEvents::all();
        return view('admin.pages.runevents.index',compact('runevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.runevents.create');
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
            'bg_img' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->heading);
        if (isset($bg_img))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
            if (!file_exists('uploads/runningevents'))
            {
                mkdir('uploads/runningevents', 0777 , true);
            }
            $bg_img->move('uploads/runningevents',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $runevents= new RunningEvents();
        $runevents->heading = $request->heading;
        $runevents->bg_img = $imagename;
        $runevents->save();
        Toastr::success('Running Events Added!','Success');
        return redirect()->route('runevents.index');

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
        $runevents= RunningEvents::findOrfail($id);
        return view('admin.pages.runevents.edit',compact('runevents'));
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
            'bg_img' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $runevents= RunningEvents::findOrfail($id);
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->heading);
        if (isset($bg_img))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
            if (!file_exists('uploads/runningevents'))
            {
                mkdir('uploads/runningevents', 0777 , true);
            }
            $bg_img->move('uploads/runningevents',$imagename);
        }else {
            $imagename = $runevents->bg_img;
        }
        
        $runevents->heading = $request->heading;
        $runevents->bg_img = $imagename;
        $runevents->save();
        Toastr::success('Running Events Updated!','Success');
        return redirect()->route('runevents.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $runevents= RunningEvents::findOrfail($id);
        // if(file_exists('uploads/runningevents'.$runevents->bg_img))
        // {
        //     unlink('uploads/runningevents'.$runevents->bg_img);
        // }
        // $runevents->delete();
        // Toastr::success('Running successfully Deleted!','Success');
        // return redirect()->back();

    }
}
