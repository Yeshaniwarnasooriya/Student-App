<?php

namespace App\Http\Controllers;

use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //return view('pages.home.index'); 
        //Image changes
        $response['banners'] = BannerFacade::all();
        return view('pages.home.index')->with($response);
    }
}
