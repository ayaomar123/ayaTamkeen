@extends("layouts.main")
@section("title","Edit Student")
@section("content")

<form enctype='multipart/form-data' method='post' action='{{asset("students-model/".$item->id)}}'>
    @csrf
    @method("put")
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Student Name</label>
            <input autofocus='true' value='{{ old("name",$item->name) }}' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" value='{{ old("email",$item->email) }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Student Phone</label>
            <input type="text" value='{{ old("phone",$item->phone) }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city_id">City</label>
            <select class='form-control' name='city_id' id='city_id'>
                <option value=''>Select City</option>
                @foreach($cities as $city)
                <option {{old('city_id',$item->city_id)==$city->id?'selected':''}} value='{{$city->id}}'>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>
            <input {{$item->active?"checked":""}} type="checkbox" name="active" />
            Active
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input {{$item->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input {{$item->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Notes</label>
            <textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes">{{ $item->notes }}</textarea>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Image</label>
            <input type='file' class="form-control" name="image" 
            id="image" />
            @if($item->image)         
            <hr> 
            <img style='max-width:300px' src='{{asset("storage/images/$item->image")}}' />  
            @endif
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a class='btn btn-light' href='{{route("students-model.index")}}'>Cancel</a>

</form>
@endsection