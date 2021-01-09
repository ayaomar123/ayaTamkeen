<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Student;
use App\Models\City;
use App\Http\Requests\StudentRequest;

class StudentsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Student::all();
        return view("students-model.index")->with('items',$items);
    }

    public function searchPagingAdvanced(Request $request)
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
        return view("students-model.search-paging-advanced")->with('items',$items);
    }

    public function searchPaging(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        $items = Student::where("name","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->paginate(10)
                ->appends(['q'=>$q]);
        return view("students-model.search-paging")->with('items',$items);
    }

    public function search(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        $items = Student::where("name","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->get();
        return view("students-model.search")->with('items',$items);
    }
    
    public function paging()
    {
        //$items = Student::simplePaginate(10);
        $items = Student::paginate(10);
        return view("students-model.paging")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view("students-model.create",compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
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
        return redirect(route("students-model.create"));
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
            return redirect(route("students-model.index"));
        }
        return view("students-model.show",compact('item'));
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
            return redirect(route("students-model.index"));
        }
        $cities = City::all();
        return view("students-model.edit",compact('item','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
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
        return redirect(route("students-model.index"));
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
        return redirect(route("students-model.index"));
    }
}
