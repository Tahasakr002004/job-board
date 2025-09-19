<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    //
    public function render(){
        return view('components.layout');
    }
}
