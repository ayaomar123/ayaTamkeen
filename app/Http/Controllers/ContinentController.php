<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContinentController extends Controller
{
    function __construct(){
        //$this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //->get = select * from continents
        $items = \DB::table("continents")->get();
        return view("continents.index")->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("continents.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //التأكد من انه الاسم موجود ولا بتجاوز 50 حرفا
        $request->validate([
            'name' => 'required|max:50'
        ]);
        //اضافة على القاعدة جدول القارات
        \DB::table("continents")->insert([
            'name' => $request['name']
        ]);
        //تخزين رسالة بشكل مؤقت في السيشن لعرضها مرة واحدة
        \Session::flash("msg","Created Successfully");
        //الى عرض القارات
        return redirect(route("continents.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find just use primary key
        //return only one item or null
        //select * from continents where id=?
        $item = \DB::table("continents")->find($id);
        if(!$item){
            //تخزين رسالة بشكل مؤقت في السيشن لعرضها مرة واحدة
            \Session::flash("msg","Invalid Item ID");
            //الى عرض القارات
            return redirect(route("continents.index"));
        }
        return view("continents.show")->withItem($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find just use primary key
        //return only one item or null
        $item = \DB::table("continents")->find($id);
        if(!$item){
            //تخزين رسالة بشكل مؤقت في السيشن لعرضها مرة واحدة
            \Session::flash("msg","Invalid Item ID");
            //الى عرض القارات
            return redirect(route("continents.index"));
        }
        return view("continents.edit")->withItem($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //التأكد من انه الاسم موجود ولا بتجاوز 50 حرفا
        $request->validate([
            'name' => 'required|max:50'
        ]);
        //تعديل جدول القارات
        \DB::table("continents")->where('id',$id)->update([
            'name' => $request['name']
        ]);
        //تخزين رسالة بشكل مؤقت في السيشن لعرضها مرة واحدة
        \Session::flash("msg","Updated Successfully");
        //الى عرض القارات
        return redirect(route("continents.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //تعديل جدول القارات
        \DB::table("continents")->where('id',$id)->delete();
        \Session::flash("msg","Deleted Successfully");
        //الى عرض القارات
        return redirect(route("continents.index"));
    }
}
