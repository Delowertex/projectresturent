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
        <div style="position: relative; top: 80px;">
            <table bgcolor="gray" border="3px">
                <tr>
                    <th style="padding: 30px; ">Name</th>
                    <th style="padding: 30px; ">Email</th>
                    <th style="padding: 30px; ">Phone</th>
                    <th style="padding: 30px; ">Date</th>
                    <th style="padding: 30px; ">Time</th>
                    <th style="padding: 30px; ">Message</th>
                </tr>

                @foreach($item as $item)
                <tr align="center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                    <td>{{$item->message}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.adminscript')
  </body>
</html>

