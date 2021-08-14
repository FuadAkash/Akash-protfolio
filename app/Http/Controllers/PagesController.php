<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Main;

use App\Models\Service;

use App\Models\Icon;

use App\Models\Protfolio;

use App\Models\About;

class PagesController extends Controller
{
    public function index(){
        $main = Main::first();
        $services = Service::all();
        $icon = Icon::first();
        $protfolios = Protfolio::all();
        $abouts = About::all();
        return view('pages.index', compact('main', 'services', 'icon', 'protfolios', 'abouts'));
    }
    
    public function print(){
        return '<h1> Hello world </h1>';
    }
}
