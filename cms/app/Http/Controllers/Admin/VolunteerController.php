<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Admin\Volunteer;
class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteer= Volunteer::all();
        return view('admin.pages.volunteer.index',compact('volunteer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.volunteer.create');
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
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/volunteer'))
            {
                mkdir('uploads/volunteer', 0777 , true);
            }
            $image->move('uploads/volunteer',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $volunteer= new Volunteer();
        $volunteer->title = $request->title;
        $volunteer->sub_title = $request->sub_title;
        $volunteer->image = $imagename;
        $volunteer->save();
        Toastr::success('Volunteer Added!','Success');
        return redirect()->route('volunteer.index');
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
        $volunteer= Volunteer::findOrfail($id);
        return view('admin.pages.volunteer.edit',compact('volunteer'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $volunteer= Volunteer::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/volunteer'))
            {
                mkdir('uploads/volunteer', 0777 , true);
            }
            $image->move('uploads/volunteer',$imagename);
        }else {
            $imagename = $volunteer->image;
        }
        
        $volunteer->title = $request->title;
        $volunteer->sub_title = $request->sub_title;
        $volunteer->image = $imagename;
        $volunteer->save();
        Toastr::success('Volunteer Updated!','Success');
        return redirect()->route('volunteer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteer= Volunteer::findOrfail($id);
        if(file_exists('uploads/volunteer/'.$volunteer->image))
        {
            unlink('uploads/volunteer/'.$volunteer->image);
        }
        $events->delete();
        Toastr::success('volunteer successfully Deleted!','Success');
        return redirect()->back();
    }
}
