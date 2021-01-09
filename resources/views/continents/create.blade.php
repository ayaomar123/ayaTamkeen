@extends("layouts.main")
@section("title","Create Continent")
@section("content")

<form method='post' action='{{route("continents.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Continent Name</label>
            <input autofocus='true' type="text" class="form-control" name="name" id="name" placeholder="Enter Continent Name">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("continents.index")}}'>Cancel</a>

</form>
@endsection