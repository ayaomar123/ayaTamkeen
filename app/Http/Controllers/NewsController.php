<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //لعرض جميع الاخبار
    function index(){
        return view("news.index");
    }
    
    //لعرض تفاصيل خبر
    function details($id){
        return view("news.details");
    }
}
