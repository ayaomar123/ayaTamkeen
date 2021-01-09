@extends("layouts.main")
@section("title","Create Student")
@section("content")

<form method='post' action='{{route("students.index")}}'>
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
            <label>
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
    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("students.index")}}'>Cancel</a>

</form>
@endsection