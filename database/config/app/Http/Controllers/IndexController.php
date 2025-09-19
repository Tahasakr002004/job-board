<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        return view('index',['pageTitle' => 'Dashboard', 'tabTitle' => 'dashboard']);
    }
    public function about(){
        return view('about',['pageTitle' => 'About', 'tabTitle' => 'about']);
    }
    public function contact(){
        return view('contact',['pageTitle' => 'Contact', 'tabTitle' => 'contact']);
    }
}
