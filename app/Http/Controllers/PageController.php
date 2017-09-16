<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
    	return view ('home.home');
    }

    public function getAbout(){
    	return view ('home.about');
    }

    public function getContact(){
    	return view ('home.contact');
    }
}
