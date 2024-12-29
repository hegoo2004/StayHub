<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details',compact('room'));
    }
    public function add_booking(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'StartDate' => 'required|date',
            'endDate' => 'required|after:StartDate',
        ]);
        $data = new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;


        $StartDate = $request->StartDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id',$id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$StartDate)->exists();
        if($isBooked)
        {

            return redirect()->back()->with('message','Room Already Booked in this date range!, please try another date');

        }
        else
        {
            $data->start_date = $request->StartDate;
        $data->end_date = $request->endDate;
        $data->save();
        return redirect()->back()->with('message','Booking Added Successfully!');
        }
    }
    
}
