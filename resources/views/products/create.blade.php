@extends("layouts.main")
@section("title","Create Product")
@section("content")

<form method='post' action='{{route("products.index")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid last name is required.
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="username">Username</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="">
            <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
        </div>
    </div>

    <button class="btn btn-primary btn-lg" type="submit">Create</button>
    <a class='btn btn-default' href='{{route("products.index")}}'>Cancel</a>
</form>
@endsection