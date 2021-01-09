<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select students.*,cities.name as city from students
        //left join cities on cities.id=students.city_id
        //order by students.name
        $items = DB::table("students")
            ->leftJoin("cities","cities.id","students.city_id")
            ->select("students.*","cities.name as city")
            ->orderBy("name")
            ->get();
        return view("students.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|max:50',
            'gender'=>'required|max:1',
        ],[
            'name.required'=>'Please enter Student Name'
        ]);

        DB::table("students")->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'notes' => $request['notes'],
            'active' => $request['active']?1:0
        ]);

        Session::flash("msg","Student Created Successfully");

        return redirect(route("students.create"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table("students")->find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("students.index"));
        }
        $city = DB::table("cities")->find($item->city_id)->name??'no-city';
        return view("students.show",compact('item','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table("students")->find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("students.index"));
        }
        return view("students.edit",compact('item'));
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
        request()->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|max:50',
            'gender'=>'required|max:1',
        ]);

        DB::table("students")->where("id",$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'notes' => $request['notes'],
            'active' => $request['active']?1:0
        ]);
        session()->flash("msg","Student Updated Successfully");
        return redirect(route("students.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("students")->where("id",$id)->delete();
        session()->flash("msg","Student Deleted Successfully");
        return redirect(route("students.index"));
    }
}
