<?php

use App\Models\Item;
use App\Models\ItemMenu;
use App\Models\Service;
use App\Models\TimeSlot;

function getServices(){
    $servcies = Service::get();
    return $servcies;
}

function getItems(){
    $items = Item::with('service')->get();
    return $items;
}

function uploadMedia($file, $path)
{
    $name = time() . '.' . $file->getClientOriginalExtension();
    $file->move($path, $name);
    return $path . '/' . $name;
}
function getItemMenus(){
    $itemMenus = ItemMenu::with('item')->get();
    return $itemMenus;
}

function weekDays(){
    $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    return $days;
}
function childTimeSlotWithComma($id)
{
    $getChildCategory = TimeSlot::where('id',$id)->pluck('time')->implode('  ,  ');
    print_r($getChildCategory);exit;
    return $getChildCategory;
}
