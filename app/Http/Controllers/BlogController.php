<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        return view("blog.index");
    }
    
    function details($id){
        return view("blog.details");
    }
    
    function contact(){
        return view("blog.contact");
    }
    
    function about(){
        return view("blog.about");
    }
}
