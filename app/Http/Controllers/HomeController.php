<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index() 
    {
        $page = Home::find(1)->all()[0];
        $slides = Slide::all();
        
        return view('home', [
            'page'   => $page,
            'slides' => $slides,
        ]);
    }
}