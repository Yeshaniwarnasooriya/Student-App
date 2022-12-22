<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class BannerController extends ParentController
{
    public function index()
    {
        $response['banners'] = BannerFacade::all();
        return view('pages.banner.index')->with($response);
    }

    //Function to store data
    public function create(Request $request)
    {
        BannerFacade::create($request->all());
        //User redirected back once the task is completed
        return redirect()->back();
    }

    //Function to delete data
    public function remove($banner_id)
    {
        BannerFacade::remove($banner_id);
        return redirect()->back();
    }

    //Function to Update status
    public function status($banner_id)
    {
        BannerFacade::status($banner_id);    
        return redirect()->back();
    }
}
