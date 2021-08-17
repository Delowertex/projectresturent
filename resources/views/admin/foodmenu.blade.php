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
        <div style="position: relative; top: 60px; right: -150px;">
            <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div>
                    <label for="">Title</label>
                    <input style="color:blue;" type="text" name="title" placeholder="Enter title" required>
                </div>
                <div>
                    <label for="">Price</label>
                    <input style="color:blue;" type="number" name="price" placeholder="Enter Price" required>
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <label for="">Description</label>
                    <input style="color:blue;" type="text" name="description" placeholder="Enter Description" required>
                </div>
                <div>
                    <input style="color: black" type="submit" value="Save">
                </div>
            </form>

            <div>
                <table bgcolor="black">
                    <tr>
                        <th style="padding: 30px">Food Name</th>
                        <th style="padding: 30px">Price</th>
                        <th style="padding: 30px">Description</th>
                        <th style="padding: 30px">Image</th>
                        <th style="padding: 30px">Action</th>
                        <th style="padding: 30px">Action2</th>
                    </tr>
                    @foreach($data as $data)
                    <tr align="center">
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->description}}</td>
                        <td><img src="/foodimage/{{$data->image}}" alt="" height="20" width="40"></td>
                        <td><a href="{{url('deletemenu', $data->id)}}">Delete</a></td>
                        <td><a href="{{url('updatemenu', $data->id)}}">Update</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>

