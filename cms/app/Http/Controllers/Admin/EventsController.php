<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Admin\Events;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Events::all();
        return view('admin.pages.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.events.create');
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
            'location' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/events'))
            {
                mkdir('uploads/events', 0777 , true);
            }
            $image->move('uploads/events',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $events= new Events();
        $events->title = $request->title;
        $events->sub_title = $request->sub_title;
        $events->location = $request->location;
        $events->image = $imagename;
        $events->save();
        Toastr::success('Events Added!','Success');
        return redirect()->route('events.index');
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
        $events= Events::findOrfail($id);
        return view('admin.pages.events.edit',compact('events'));
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
            'location' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $events= Events::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/events'))
            {
                mkdir('uploads/events', 0777 , true);
            }
            $image->move('uploads/events',$imagename);
        }else {
            $imagename = $events->image;
        }
        
        $events->title = $request->title;
        $events->sub_title = $request->sub_title;
        $events->location = $request->location;
        $events->image = $imagename;
        $events->save();
        Toastr::success('Events Updated!','Success');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events= Events::findOrfail($id);
        if(file_exists('uploads/events/'.$events->image))
        {
            unlink('uploads/events/'.$events->image);
        }
        $events->delete();
        Toastr::success('Events successfully Deleted!','Success');
        return redirect()->back();
    }
}
