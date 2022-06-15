<?php

namespace App\Http\Controllers\Tawan;

use App\Http\Controllers\Controller;
use App\Models\CuisineCategory;
use App\Models\FoodMenu;
use App\Models\Menu;

class TawanController extends Controller
{
    public function getMenu(){
        $datas = FoodMenu::where("id_resto",'=',3)->get();
        return $datas;
    }

    public function getCuisineCategory(){
        $datas = CuisineCategory::where("id_resto",'=',3)->get();
        return $datas;
    }
}
