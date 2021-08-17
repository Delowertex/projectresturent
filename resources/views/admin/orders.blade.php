<x-app-layout>
    
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    <div class="container">
    <h1>Customer Orders</h1>

    <form action="{{url('/search')}}" method="GET">
        @csrf
        <input type="text" name="search" style="color: blue;">
        <input type="submit" value="Search" class="btn btn-success">
    </form>

    <table>
        <thead>
            <tr>
                <th style="padding: 30px;">Name</th>
                <th style="padding: 30px;">Phone</th>
                <th style="padding: 30px;">Address</th>
                <th style="padding: 30px;">Foodname</th>
                <th style="padding: 30px;">Price</th>
                <th style="padding: 30px;">Quantity</th>
                <th style="padding: 30px;">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
                <tr align="center" style="background: black;">
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->foodname}}</td>
                    <td>{{$data->price}}$</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->price* $data->quantity}}$</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>

