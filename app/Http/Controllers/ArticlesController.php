<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Student;
use App\Models\City;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Shaymaa Adding articles.index
    public function index()
    {
        $q = $request->q;
        $active = $request->active;
        $gender = $request->gender;
        //$query = Student::whereRaw('true');
        $query = Student::where('id','>',0);
        if($gender){
            $query->where('gender',$gender);
        }
        if($active!=''){
            $query->where('active',$active);
        }
        if($q){
            /*$query->where('name','like',"%$q%")
            ->orWhere('email','like',"%$q%")
            ->orWhere('phone','like',"%$q%");*/
            $query->whereRaw('(name like ? or email like ? or phone like?)',["%$q%","%$q%","%$q%"]);
        }
        $items = $query->paginate(10)
            ->appends([
                'q'     =>$q,
                'gender'=>$gender,
                'active'=>$active
            ]);
        return view("articles.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view("articles.create",compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if(!isset($request['active'])){
            $request['active'] = 0;
        }
        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        Student::create($requestData);
        Session::flash("msg","s:Student Created Successfully");
        return redirect(route("articles.create"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Student::find($id);
        if(!$item){
            session()->flash("msg","w:Invalid Id");
            return redirect(route("articles.index"));
        }
        return view("articles.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Student::find($id);
        if(!$item){
            session()->flash("msg","e:Invalid Id");
            return redirect(route("articles.index"));
        }
        $cities = City::all();
        return view("articles.edit",compact('item','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $request['active'] = isset($request['active'])?1:0;
        $itemDB = Student::find($id);        
        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        $itemDB->update($requestData);

        session()->flash("msg","s:Student Updated Successfully");
        return redirect(route("articles.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB = Student::find($id);
        $itemDB->delete();
        session()->flash("msg","w:Student Deleted Successfully");
        return redirect(route("articles.index"));
    }
}
