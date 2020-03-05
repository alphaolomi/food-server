<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application Index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('pages.index');
    }

    /**
     * Show the application Index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact(){
        return view('pages.contact');
    }

  }
