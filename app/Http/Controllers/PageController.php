<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function soorten()
    {
        return view('pages.soorten');
    }

    public function merken()
    {
        return view('pages.merken');
    }

    public function onderhoud()
    {
        return view('pages.onderhoud');
    }
}
