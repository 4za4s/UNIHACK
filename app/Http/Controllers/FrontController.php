<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Video;
use App\Models\Setting;
use App\Models\Pin;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function index()
    {
        $data["setting"] = Setting::first();
        $data["page"] = Page::first();
        $data["videos"] = Video::all();
        $data["pins"] = Pin::all();
        return view("welcome", $data);
    }
    public function detail()
    {
        $data["setting"] = Setting::first();
        $data["page"] = Page::first();
        $data["videos"] = Video::all();
        $data["pins"] = Pin::all();
        return view("volunteer-detail", $data);
    }
}
