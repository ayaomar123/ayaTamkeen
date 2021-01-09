@extends("layouts.main")
@section("title","Create User")
@section("content")
<form method='post' action='{{route("users.update",$item->id)}}'>
    @csrf
    @method("put")
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Full Name</label>
            <input autofocus='true' value='{{ old("name",$item->name) }}' type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
            
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
            <label for="phone">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter User Password">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a class='btn btn-light' href='{{route("users.index")}}'>Cancel</a>

</form>
@endsection