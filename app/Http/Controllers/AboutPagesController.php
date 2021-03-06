<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\About;

class AboutPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $abouts = About::all();
        return view('pages.abouts.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'title_1' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        $abouts = new About;
        $abouts->title = $request->title;
        $abouts->title_1 = $request->title_1;
        $abouts->description = $request->description;

        $image_file = $request->file('image');
        Storage::putFile('public/img/', $image_file);
        $abouts->image ="storage/img/".$image_file->hashName();

        $abouts->save();

        return redirect()->route('admin.abouts.create')->with('success', 'About made!');
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
        $about = About::find($id);
        return view('pages.abouts.edit', compact('about'));
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
        $request->validate([
            'title' => 'required|string',
            'title_1' => 'required|string',
            'description' => 'required|string',
        ]);

        $abouts = About::find($id);
        $abouts->title = $request->title;
        $abouts->title_1 = $request->title_1;
        $abouts->description = $request->description;

        if($request->file('image')){
            
            $image_file = $request->file('image');
            Storage::putFile('public/img/', $image_file);
            $abouts->image ="storage/img/".$image_file->hashName();
        }

        $abouts->save();

        return redirect()->route('admin.abouts.list')->with('success', 'New about made!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);

        @unlink(public_path($about->image));

        $about->delete();

        return redirect()->route('admin.abouts.list')->with('success', 'About deleted!');
    }
}