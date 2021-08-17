<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodcheaf;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user(){
        $data = User::all();
        return view('admin.users', compact('data'));
    }

    public function deleteusers($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function deletemenu($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatemenu($id){
        $data = Food::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updated(Request $request, $id){
        $data = Food::find($id);
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }

    public function foodmenu(){
        $data = Food::all();
        return view('admin.foodmenu', compact('data'));
    }

    public function foodupload(Request $request){
        $data = new Food;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }

    public function resurvation(Request $request){
        $data = new Reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back();
    }

    public function foodchef(){
        $data = Foodcheaf::all();
        return view('admin.admincheaf', compact('data'));
    }

    public function uploadcheaf(Request $request){
        $data = new Foodcheaf;
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('cheafimage', $imageName);
        $data->image = $imageName;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    public function updatecheaf($id){
        $data = Foodcheaf::find($id);
        return view('admin.updatecheaf', compact('data'));
    }

    public function updatfoodcheaf(Request $request, $id){
        $data = Foodcheaf::find($id);
        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('cheafimage', $imageName);
            $data->image = $imageName;
        }
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    public function deletefoodcheaf($id){
        $data = Foodcheaf::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function viewresurvation(){
        if(Auth::id()){
            $item = Reservation::all();
            return view('admin.adminreservation', compact('item'));
        }else{
            return redirect('/login'); 
        }
        
    }

    public function orders(){
        $data = Order::all();
        return view('admin.orders', compact('data'));
    }
    
    public function search(Request $request){
        $search = $request->search;
        $data = Order::where('name', 'LIKE', '%'.$search.'%')->orWhere('foodname', 'LIKE', '%'.$search.'%')
        ->get();
        return view('admin.orders', compact('data'));
    }
}
