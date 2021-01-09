@extends("layouts.main")
@section("title","Products List")
@section("content")

<a href='{{route("products.create")}}' class='btn btn-success'>Create New Product</a>

<table class="table table-striped table-sm mt-3">
          <thead>
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Category</th>
              <th>Price</th>
              <th>Brand</th>
              <th width="20%">Options</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>Praesent</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              <td>ante</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Sed</td>
              <td>nisi</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>sem</td>
              <td>at</td>
              <td>
                  <form method='post' action='{{asset("products/15")}}'>
                    @csrf
                    @method("delete")
                    <a href='{{route("products.show",15)}}' class='btn btn-info btn-sm'>
                        Details
                    </a>
                    <a href='{{route("products.edit",15)}}' class='btn btn-primary btn-sm'>
                        Edit
                    </a>
                    <input onclick='return confirm("are you sure dude?")' type="submit" value="Delete" class='btn btn-sm btn-danger' />
                  </form>
              </td>
            </tr>
          </tbody>
        </table>
@endsection