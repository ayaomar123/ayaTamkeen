<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function mission(){
        return view("about.mission");
    }
    
    function vision(){
        return view("about.vision");
    }
}
