<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Footer;
use Carbon\Carbon;
class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer=Footer::all();
        return view('admin.pages.footer.index',compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.footer.create');
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
            'blog' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/footer'))
            {
                mkdir('uploads/footer', 0777 , true);
            }
            $image->move('uploads/footer',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $footer= new Footer();
        $footer->blog = $request->blog;
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->location = $request->location;
        $footer->image = $imagename;
        $footer->save();
        Toastr::success('Footer Content Added!','Success');
        return redirect()->route('footer.index');
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
        $footer=Footer::findOrfail($id);
        return view('admin.pages.footer.edit',compact('footer'));
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
            'blog' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $footer=Footer::findOrfail($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/footer'))
            {
                mkdir('uploads/footer', 0777 , true);
            }
            $image->move('uploads/footer',$imagename);
        }else {
            $imagename = $footer->image;
        }
        $footer->blog = $request->blog;
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->location = $request->location;
        $footer->image = $imagename;
        $footer->save();
        Toastr::success('Footer Content Updated!','Success');
        return redirect()->route('footer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::findOrfail($id);
        if (file_exists('uploads/footer/'.$footer->image))
        {
            unlink('uploads/footer/'.$footer->image);
        }
        $footer->delete();
        Toastr::success('footer Content Succcessfully Deleted!','Success');
        return redirect()->back();
    }
}
