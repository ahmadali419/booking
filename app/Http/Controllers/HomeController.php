<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PostalCode;
use App\Models\Service;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Whoops\Run;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function validateCode(Request $request){
      $validatePostalCode  =  PostalCode::where('code',$request->code)->first();
      if(empty($validatePostalCode)){
        return redirect()->back()->with('message','Please enter valid postal code');
      }else{
        return redirect()->route('services');
      }
    }

    public function services(){
        return view('services');
    }


    public function serviceItems(Request $request){
      if(!empty($request->id)){
        $service = Service::Where('id',$request->id)->first();
        if($service){
          $lists = Item::with('itemMenus')->where('service_id',$request->id)->get();
          return view('steps-form',get_defined_vars());
        }else{
          return redirect()->back()->with('message','You cannot proceed further');
        }
        // echo "<pre>"; print_r($lists);exit;
      }else{
        return redirect()->back()->with('message','You cannot proceed further');
      }
    }


    public function getTimeSlots(Request $request){
      if(!empty($request->date)){
        $day = date('l', strtotime($request->date));
        $timeSlot = TimeSlot::where(['day'=>$day,'status'=>'0'])->first();
        $timelineHtml = View::make('components.timeline', get_defined_vars())->render();
        return response()->json(['timelineHtml'=>$timelineHtml]);
      }
    }


    public function setItemInSession(Request $request){
       $item = $request->item;
       $item_menu = $request->item_menu;
       $qty = $request->qty;

       $cart = Session::get('cart');
       $cart[] = array(
           "item" => $item,
           "item-menu" => $item_menu,
           "qty" => $qty
       );

   
       Session::put('cart', $cart);
       $cart = Session::get('cart');

       dd($cart);
    }
}
