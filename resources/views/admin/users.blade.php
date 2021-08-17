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
        <div style="position: relative; top: 80px; right: -150px;">
            <table bgcolor="gray" border="3px">
                <tr>
                    <th style="padding: 30px; ">Name</th>
                    <th style="padding: 30px; ">Email</th>
                    <th style="padding: 30px; ">Action</th>
                </tr>

                @foreach($data as $item)
                <tr align="center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    @if($item->usertype==0)
                        <td><a href="{{url('/deleteuser', $item->id)}}">delete</a></td>
                    @else
                        <td><a>Not Allowed</a></td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>

