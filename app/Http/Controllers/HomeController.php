<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() 
    {
        $page = (object) array(
            'keywords'    => 'Home keywords',
            'description' => 'Home description',
        );
        
        return view('home', [
            'title' => 'Home',
            'page'  => $page,
        ]);
    }
}