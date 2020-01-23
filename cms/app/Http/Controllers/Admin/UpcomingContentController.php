<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Admin\UpcomingContent;
class UpcomingContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomcontent=UpcomingContent::all();
        return view('admin.pages.upcomingcontent.index',compact('upcomcontent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.upcomingcontent.create');
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
            if (!file_exists('uploads/upcoming'))
            {
                mkdir('uploads/upcoming', 0777 , true);
            }
            $image->move('uploads/upcoming',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $upcomcontent= new UpcomingContent();
        $upcomcontent->title = $request->title;
        $upcomcontent->sub_title = $request->sub_title;
        $upcomcontent->location = $request->location;
        $upcomcontent->image = $imagename;
        $upcomcontent->save();
        Toastr::success('Upcoming Content Added!','Success');
        return redirect()->route('upcomingcontent.index');
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
        $upcomcomcon= Events::findOrfail($id);
        return view('admin.pages.upcomingcontent.edit',compact('upcomcontent'));
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
        $upcomcontent= UpcomingContent::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/upcoming'))
            {
                mkdir('uploads/upcoming', 0777 , true);
            }
            $image->move('uploads/upcoming',$imagename);
        }else {
            $imagename = $upcomcontent->image;
        }
        
        $upcomcontent->title = $request->title;
        $upcomcontent->sub_title = $request->sub_title;
        $upcomcontent->location = $request->location;
        $upcomcontent->image = $imagename;
        $upcomcontent->save();
        Toastr::success('Upcoming Content Updated!','Success');
        return redirect()->route('upcomingcontent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upcomcontent= UpcomingContent::findOrfail($id);
        if(file_exists('uploads/upcoming/'.$upcomcontent->image))
        {
            unlink('uploads/upcoming/'.$upcomcontent->image);
        }
        $upcomcontent->delete();
        Toastr::success('Upcoming Content successfully Deleted!','Success');
        return redirect()->back();
    }
}
