@extends("layouts.main")
@section("title","Show Continent")
@section("content")

<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Continent Name</label>
            <input value='{{$item->name}}' type="text" readonly class="form-control" name="name" id="name" placeholder="Enter Continent Name">
            
        </div>
    </div>
    <a class='btn btn-light' href='{{route("continents.index")}}'>Cancel</a>

</div>
@endsection