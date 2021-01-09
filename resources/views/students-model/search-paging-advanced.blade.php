@extends("layouts.main")
@section("title","Students Search Paging Advanced")
@section("content")

<form class='row mb-3'>
    <div class='col-sm-4'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
    </div>
    <div class='col-sm-2'>
        <select name='gender' class='form-control'>
            <option value=''>Any Gender</option>
            <option {{ request()->gender=='M'?"selected":"" }} value='M'>Male</option>
            <option {{ request()->gender=='F'?"selected":"" }} value='F'>Female</option>
        </select>
    </div>
    <div class='col-sm-2'>
        <select name='active' class='form-control'>
            <option value=''>Any Status</option>
            <option {{ request()->active=='1'?"selected":"" }} value='1'>Active</option>
            <option {{ request()->active=='0'?"selected":"" }} value='0'>In Active</option>
        </select>
    </div>
    <div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <div class='col-sm-3'>
        <a href='{{route("students-model.create")}}' class='btn btn-success'>Create New Student</a>
    </div>
</form>
@if($items->count()>0)
<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Active</th>
            <th>City</th>
            <th width="22%">Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->gender=='m'?"Male":"Female" }}</td>
            <td>{{ $item->active }}</td>
            <td>{{ $item->city->name??'' }}</td>
            <td>
                <form method='post' action='{{asset("students-model/".$item->id)}}'>
                    @csrf
                    @method("delete")
                    <a href='{{ route("students-model.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                    <a href='{{ route("students-model.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
                    <input type='submit' onclick='return confirm("Are you sure?")' value='Delete' class='btn btn-danger btn-sm ' />
                    <a href='{{ route("students-model.delete",$item->id) }}' class='btn btn-warning btn-sm' onclick='return confirm("Are you sure?")'>Delete</a>
                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $items->links() }}
@else
<div class='alert alert-info'><b>Sorry!</b> there is no results to your search</div>
@endif
@endsection