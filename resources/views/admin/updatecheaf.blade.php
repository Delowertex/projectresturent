<x-app-layout>
    
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
  @include('admin.admincss')
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    
    <form action="{{url('updatefoodcheaf', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div>
            <label for="">Cheaf Name</label>
            <input style="color: blue" type="text" name="name" value="{{$data->name}}">
        </div>
        <div>
            <label for="">Speciality</label>
            <input style="color: blue" type="text" name="speciality" value="{{$data->speciality}}">
        </div>
        <div>
            <label for="">Old Image</label>
            <img src="/cheafimage/{{$data->image}}" alt="" height="20" width="40">
        </div>
        <div>
            <label for="">New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input style="color: blue" type="submit" value="Update">
        </div>
    </form>
    </div>
    

    @include('admin.adminscript')
  </body>
</html>

