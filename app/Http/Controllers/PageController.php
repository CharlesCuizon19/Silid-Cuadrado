<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }
    public function about_us()
    {
        return view('pages.about-us');
    }
    public function products()
    {
        return view('pages.products');
    }
}
