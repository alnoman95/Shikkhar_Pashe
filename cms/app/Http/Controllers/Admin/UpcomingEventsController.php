<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\UpcomingEvents;
use Carbon\Carbon;
class UpcomingEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming=UpcomingEvents::all();
        return view('admin.pages.upcomingevents.index',compact('upcoming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.upcomingevents.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'bg_img' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
            if (!file_exists('uploads/upcoming'))
            {
                mkdir('uploads/upcoming', 0777 , true);
            }
            $bg_img->move('uploads/upcoming',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $upcoming= new UpcomingEvents();
        $upcoming->heading = $request->heading;
        $upcoming->title = $request->title;
        $upcoming->sub_title = $request->sub_title;
        $upcoming->bg_img = $imagename;
        $upcoming->save();
        Toastr::success('Upcoming Events Added!','Success');
        return redirect()->route('upcoming.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upcoming=UpcomingEvents::findOrfail($id);
        return view('admin.pages.upcomingevents.edit',compact('upcoming'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'bg_img' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $upcoming= UpcomingEvents::findOrfail($id);
        $bg_img = $request->file('bg_img');
        $slug = str_slug($request->title);
        if (isset($bg_img))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $bg_img->getClientOriginalExtension();
            if (!file_exists('uploads/upcoming'))
            {
                mkdir('uploads/upcoming', 0777 , true);
            }
            $bg_img->move('uploads/upcoming',$imagename);
        }else {
            $imagename = $upcoming->bg_img;
        }
        
        $upcoming->heading = $request->heading;
        $upcoming->title = $request->title;
        $upcoming->sub_title = $request->sub_title;
        $upcoming->bg_img = $imagename;
        $upcoming->save();
        Toastr::success('Upcoming Events Updated!','Success');
        return redirect()->route('upcoming.index');

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
