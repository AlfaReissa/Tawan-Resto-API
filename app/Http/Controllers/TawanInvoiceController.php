<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\FoodCartCacheMobile;
use App\Models\FoodInvoice;
use App\Models\FoodMenu;
use App\Models\OrderedItem;
use App\Models\User;
use Illuminate\Http\Request;

class TawanInvoiceController extends Controller
{

    function user($id)
    {
        return User::findOrFail($id);
    }

    function getByUser($id)
    {
        $returnObject = new \stdClass();

        $invoiceObj = FoodInvoice::where("id_user", '=', $id)->get();
        $returnObject->invoiceObject = $invoiceObj;
        return $invoiceObj;
    }


    function store(Request $request)
    {
        $j = 0;

        $invoiceObj = new FoodInvoice();
        $invoiceObj->address = $request->address;
        $invoiceObj->lat = $request->latitude;
        $invoiceObj->long = $request->longitude;
        $invoiceObj->id_user = $request->id_user;
        $invoiceObj->id_resto = $request->id_resto;
        $invoiceObj->notes = $request->notes;
        $invoiceObj->status = "WAITING";

        $isError = false;
        $saveInvoice = $invoiceObj->save();
        if ($saveInvoice && count($request->cart_ids) != 0) {
            foreach ($request->cart_ids as $cart_id) {
                $cartObject = FoodCartCacheMobile::findOrFail((int)$cart_id);
                $orderItem = new OrderedItem();
                $orderItem->order_snapshot = $cartObject;
                $orderItem->id_invoice = $invoiceObj->id;
                if ($orderItem->save()) {
                        FoodCartCacheMobile::destroy($cart_id);
                } else {
                    $invoiceObj->delete();
                    $isError = true;
                }
            }
        }

        if ($isError) {
            $invoiceObj->delete();
            return RazkyFeb::general(400, "Gagal", 0, 0);
        } else {
            return RazkyFeb::responseSuccessWithData(
                200,
                1,
                1,
                "OK",
                "OK",
                $invoiceObj,
            );
        }
    }
}
