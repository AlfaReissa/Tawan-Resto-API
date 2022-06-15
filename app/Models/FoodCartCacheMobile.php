<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCartCacheMobile extends Model
{
    use HasFactory;

    protected $appends = ['price','price_multiplied','menu_name','menu'];

    function getPriceAttribute(){
        $data = FoodMenu::findOrFail($this->id_menu);
        return $data->price;
    }

    function getMenuNameAttribute(){
        $data = FoodMenu::findOrFail($this->id_menu);
        return $data->name;
    }

    function getMenuAttribute(){
        $data = FoodMenu::findOrFail($this->id_menu);
        return $data;
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:00',
    ];


    function getPriceMultipliedAttribute(){
        $data = FoodMenu::findOrFail($this->id_menu);
        return $data->price * $this->quantity;
    }
}
