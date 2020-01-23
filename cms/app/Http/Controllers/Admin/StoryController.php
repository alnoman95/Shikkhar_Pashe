<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Admin\Story;
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $story=Story::all();
        return view('admin.pages.story.index',compact('story'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.story.create');
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
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/story'))
            {
                mkdir('uploads/story', 0777 , true);
            }
            $image->move('uploads/story',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $story= new Story();
        $story->title = $request->title;
        $story->sub_title = $request->sub_title;
        $story->name = $request->name;
        $story->image = $imagename;
        $story->save();
        Toastr::success('Story Added!','Success');
        return redirect()->route('story.index');
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
        $story= Story::findOrfail($id);
        return view('admin.pages.story.edit',compact('story'));
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
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $story= Story::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/story'))
            {
                mkdir('uploads/story', 0777 , true);
            }
            $image->move('uploads/story',$imagename);
        }else {
            $imagename = $story->image;
        }
        $story->title = $request->title;
        $story->sub_title = $request->sub_title;
        $story->name = $request->name;
        $story->image = $imagename;
        $story->save();
        Toastr::success('Story Updated!','Success');
        return redirect()->route('story.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story=Story::findOrfail($id);
        if(file_exists('uploads/story/'.$story->image))
        {
            unlink('uploads/story/'.$story->image);
        }
        $story->delete();
        Toastr::success('Story Successfully Deleted!','Success');
        return redirect()->back();
    }
}
