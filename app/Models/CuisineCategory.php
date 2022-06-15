<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisineCategory extends Model
{
    use HasFactory;

    protected $appends = ['menus'];

    function getMenusAttribute(){
        $datas = FoodMenu::where("id_cuisine",'=',$this->id)->get();
        return $datas;
    }
}
