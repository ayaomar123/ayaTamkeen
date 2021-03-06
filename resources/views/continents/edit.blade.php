@extends("layouts.main")
@section("title","Edit Continent")
@section("content")

<form method='post' action='{{asset("continents/".$item->id)}}'>
    @csrf
    @method("put")
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Continent Name</label>
            <input autofocus type="text" value='{{$item->name}}' class="form-control" name="name" id="name" placeholder="Enter Continent Name">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a class='btn btn-light' href='{{route("continents.index")}}'>Cancel</a>

</form>
@endsection