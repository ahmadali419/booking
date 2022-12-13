<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function service(){
        return $this->belongsTo(Service::class ,'service_id');
    }

    public function itemMenus(){
        return $this->hasMany(ItemMenu::class,'item_id');
    }
}
