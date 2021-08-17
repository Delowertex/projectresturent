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
    <div style="margin-top: 30px;">
        <form action="{{url('/uploadcheaf')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div>
                <label for="">Name</label>
                <input style="color: blue" type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div>
                <label for="">Speciality</label>
                <input style="color: blue" type="text" name="speciality" placeholder="Enter your Speciality" required>
            </div>

            <div>
                <input type="file" name="image" required>
            </div>
            <div>
                <input type="submit" value="Save" style="color: blue;">
            </div>
        </form>
        <table border="1px white solid !important;">
            <tr>
                <th style="padding: 30px;">Chef Name</th>
                <th style="padding: 30px;">Speciality</th>
                <th style="padding: 30px;">Image</th>
                <th style="padding: 30px;">Action</th>
                <th style="padding: 30px;">Action2</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->speciality}}</td>
                <td><img src="/cheafimage/{{$data->image}}" alt="" height="20" width="50"></td>
                <td><a href="{{url('/updatecheaf', $data->id)}}">Update</a></td>
                <td><a href="{{url('/deletecheaf', $data->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    

    
    </div>

    @include('admin.adminscript')
  </body>
</html>

