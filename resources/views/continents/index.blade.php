@extends("layouts.main")
@section("title","Manage Continents")
@section("content")

<a href='{{route("continents.create")}}' class='btn btn-success'>Create New Continent</a>

<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th width="20%">Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form method='post' action='{{asset("continents/".$item->id)}}'>
                    @csrf
                    @method("delete")
                    <a href='{{ route("continents.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                    <a href='{{ route("continents.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                    <input type='submit' onclick='return confirm("Are you sure?")' value='Delete' class='btn btn-danger btn-sm ' />
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection