<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\AllHeading;
use Carbon\carbon;
class AllHeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allheading=AllHeading::all();
        return view('admin.pages.allheading.index',compact('allheading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.allheading.create');
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
            'causes_heading' => 'required',
            'causes_subheading' => 'required',
            'events_heading' => 'required',
            'events_subheading' => 'required',
            'story_heading' => 'required',
            'story_subheading' => 'required',
        ]);
        $allheading= new AllHeading();
        $allheading->causes_heading = $request->causes_heading;
        $allheading->causes_subheading = $request->causes_subheading;
        $allheading->events_heading = $request->events_heading;
        $allheading->events_subheading = $request->events_subheading;
        $allheading->story_heading = $request->story_heading;
        $allheading->story_subheading = $request->story_subheading;
        $allheading->save();
        Toastr::success('All Heading Added!','Success');
        return redirect()->route('allheading.index');
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
        $allheading= AllHeading::findOrfail($id);
        return view('admin.pages.allheading.edit',compact('allheading'));
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
            'causes_heading' => 'required',
            'causes_subheading' => 'required',
            'events_heading' => 'required',
            'events_subheading' => 'required',
            'story_heading' => 'required',
            'story_subheading' => 'required',
        ]);
        $allheading= AllHeading::findOrfail($id);
        $allheading->causes_heading = $request->causes_heading;
        $allheading->causes_subheading = $request->causes_subheading;
        $allheading->events_heading = $request->events_heading;
        $allheading->events_subheading = $request->events_subheading;
        $allheading->story_heading = $request->story_heading;
        $allheading->story_subheading = $request->story_subheading;
        $allheading->save();
        Toastr::success('All Heading Updated!','Success');
        return redirect()->route('allheading.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allheading= AllHeading::findOrfail($id);
        $allheading->delete();
        Toastr::success('All Heading Successfully Deleted!','Success');
        return redirect()->back();
    }
}
