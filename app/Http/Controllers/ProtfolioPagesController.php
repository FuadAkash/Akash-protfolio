<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Protfolio;

class ProtfolioPagesController extends Controller
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
        $protfolios = Protfolio::all();
        return view('pages.protfolios.list', compact('protfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.protfolios.create');
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
            'sub_title' => 'required|string',
            'big_image' => 'required|image',
            'small_image' => 'required|image',
            'description' => 'required|string',
            'clint' => 'required|string',
            'category' => 'required|string',
        ]);

        $protfolios = new Protfolio;
        $protfolios->title = $request->title;
        $protfolios->sub_title = $request->sub_title;
        $protfolios->description = $request->description;
        $protfolios->clint = $request->clint;
        $protfolios->category = $request->category;

        $big_file = $request->file('big_image');
        Storage::putFile('public/img/', $big_file);
        $protfolios->big_image ="storage/img/".$big_file->hashName();

        $small_file = $request->file('small_image');
        Storage::putFile('public/img/', $small_file);
        $protfolios->small_image ="storage/img/".$small_file->hashName();

        $protfolios->save();

        return redirect()->route('admin.protfolios.create')->with('success', 'New protfolio made!');
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
        $protfolio = Protfolio::find($id);
        return view('pages.protfolios.edit', compact('protfolio'));
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
            'sub_title' => 'required|string',
            'description' => 'required|string',
            'clint' => 'required|string',
            'category' => 'required|string',
        ]);

        $protfolios = Protfolio::find($id);
        $protfolios->title = $request->title;
        $protfolios->sub_title = $request->sub_title;
        $protfolios->description = $request->description;
        $protfolios->clint = $request->clint;
        $protfolios->category = $request->category;

        if($request->file('big_image')){
            
            $big_file = $request->file('big_image');
            Storage::putFile('public/img/', $big_file);
            $protfolios->big_image ="storage/img/".$big_file->hashName();
        }
        

        if($request->file('small_image')){

            $small_file = $request->file('small_image');
            Storage::putFile('public/img/', $small_file);
            $protfolios->small_image ="storage/img/".$small_file->hashName();
        }
        

        $protfolios->save();

        return redirect()->route('admin.protfolios.list')->with('success', 'New protfolio made!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protfolio = Protfolio::find($id);

        @unlink(public_path($protfolio->big_image));

        @unlink(public_path($protfolio->small_image));

        $protfolio->delete();

        return redirect()->route('admin.protfolios.list')->with('success', 'Protfolio deleted!');
    }
}