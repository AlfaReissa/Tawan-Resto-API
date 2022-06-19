<?php

namespace App\Http\Controllers\RestoAdmin;

use App\Http\Controllers\Controller;
use App\Models\CuisineCategory;
use App\Models\FoodInvoice;
use App\Models\FoodMenu;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodOrderController extends Controller
{
    public function all(Request $request)
    {
        $isShowAll = $request->show_all;
        $datas =  FoodInvoice::where('id_resto','=',Auth::id());
        if($isShowAll==1){
            return $datas->limit(10)->get();
        }else{
            $datas = $datas->paginate();
        }

        return view('admin_resto.food_order.manage')->with(compact('datas'));
    }

    public function viewDetail(Request $request,$id){
        $data = FoodInvoice::findOrFail($id);
        return view('admin_resto.food_order.edit')->with(compact('data'));
    }
}
