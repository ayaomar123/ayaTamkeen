@extends("layouts.main")
@section("title","Show Student")
@section("content")
<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Student Name</label>
            <input readonly autofocus='true' value='{{ $item->name }}' type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input readonly type="text" value='{{ $item->email }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Student Phone</label>
            <input readonly type="text" value='{{ $item->phone }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>
            <input disabled {{$item->active?"checked":""}} type="checkbox" name="active" />
            Active
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input disabled {{$item->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input disabled {{$item->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city">City</label>
            <input type="text" readonly class="form-control" value='{{$city}}' />
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Notes</label>
            <textarea readonly class="form-control" name="notes" id="notes" placeholder="Enter Notes">{{ $item->notes }}</textarea>
            
        </div>
    </div>
    
    <a href='{{ route("students.edit",$item->id) }}' class='btn btn-sm btn-info'>Edit</a>
    <a class='btn btn-light' href='{{route("students.index")}}'>Cancel</a>

</form>
@endsection