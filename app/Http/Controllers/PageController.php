<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title="Welcome to laravel";
        // passing value with compact
        return view('pages.index', compact('title'));
    }

    public function about()
    {   
        $title='About us';
        //using with to pass a value
        return view('pages.about')->with('title', $title); 
    }
    public function services()
    {   
        $data= array(
            'title'=>'services',
            'services'=>['web design','machine learning', 'SEO']
        );
        return view('pages.services')->with($data); 
    }

}


