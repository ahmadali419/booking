<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeSlotController extends Controller
{
    public function index(){
        return view('time-slots.list',get_defined_vars());
    }

    public function create(){
        $timeSlot = TimeSlot::get()->toArray();
        return view('time-slots.create',get_defined_vars());
    }

    public function store(Request $request){
       DB::table('time_slots')->delete();
       $day = $request->day;
       $time = $request->time;
       $limit = $request->limit;
       $status = $request->status;
       $timeSlotData = null;
       $slotsData = null;
       foreach($day as $dayKey => $dayValue){
        if(!empty($time[$dayValue])){
            foreach($time[$dayValue] as $timeKey => $timeValue){
               $timeSlotData[$dayValue] [] = $timeValue;
            }
          }
          $slotsData[] = [
            'day'=>$dayValue,
            'limit'=>$limit[$dayValue] ?? '',
            'time'=> !empty($timeSlotData[$dayValue]) ?  json_encode($timeSlotData[$dayValue]) : '',
            'status'=>$status[$dayValue] ?? '0'
          ];
        }
       $query  = TimeSlot::insert($slotsData);
       if($query){
        return redirect()->back()->with('message','Time Slot added successfully!');
       }else{
        return redirect()->back()->with('message','Time Slot is not added successfully!');
       }
    }
}
