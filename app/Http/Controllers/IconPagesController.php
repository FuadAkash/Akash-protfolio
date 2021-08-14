<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Icon;

class IconPagesController extends Controller
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
    public function index()
    {
        $icon = Icon::first();
        return view('pages.icon', compact('icon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'ic_title' => 'required|string',
        ]);

        $icon = Icon::first();
        $icon->ic_title = $request->ic_title;
        

        if($request->file('icon')){
            $icon_file = $request->file('icon');
            $icon_file->storeAs('public/ic_img/','icon.' . $icon_file->getclientOriginalExtension());
            $icon->icon = 'storage/ic_img/icon.' . $icon_file->getclientOriginalExtension();
        }

        $icon->save();

        return redirect()->route('admin.icon.update')->with('success', 'Successful!');
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
