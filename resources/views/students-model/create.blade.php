@extends("layouts.main")
@section("title","Create Student")
@section("content")
<form enctype='multipart/form-data' method='post' action='{{route("students-model.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Student Name</label>
            <input autofocus='true' value='{{ old("name") }}' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" value='{{ old("email") }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Student Phone</label>
            <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city_id">City</label>
            <select class='form-control' name='city_id' id='city_id'>
                <option value=''>Select City</option>
                @foreach($cities as $city)
                <option {{old('city_id')==$city->id?'selected':''}} value='{{$city->id}}'>{{$city->name}} ({{$city->students->count()}})</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>
            <!--input type='hidden' value='0' name='active' /-->
            <input value='1' {{old('active')?"checked":""}} type="checkbox" name="active" />
            Active
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input {{old('gender')=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input {{old('gender')=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Notes</label>
            <textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes">{{ old("notes") }}</textarea>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Image</label>
            <input type='file' class="form-control" name="image" 
            id="image" />            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("students-model.index")}}'>Cancel</a>

</form>
@endsection