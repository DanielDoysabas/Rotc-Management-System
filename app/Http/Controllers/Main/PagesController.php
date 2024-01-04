<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('main.pages.home');
    }
    
    public function otp(){
        return view('main.pages.otp');
    }
}