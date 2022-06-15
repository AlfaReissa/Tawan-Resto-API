<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\FoodCartCacheMobile;
use App\Models\FoodMenu;
use App\Models\RestaurantDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodCartCacheController extends Controller
{

    function all()
    {
        return FoodCartCacheMobile::all();
    }

    function checkIfAlreadyIn($idUser,$idMenu)
    {
        $data = FoodCartCacheMobile::where([
            ['id_user', '=', $idUser],
            ['id_menu', '=', $idMenu],
        ]);

        return $data->first();
    }

    function getByUser($id)
    {
        $data = new \stdClass();
        $cart = FoodCartCacheMobile::where("id_user", '=', $id)->get();

        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item->quantity;
            $menu = FoodMenu::findOrFail($item->id_menu);
            $totalPrice += $item->quantity * $menu->price;
        }

        $data->total_price = $totalPrice;
        $data->total_price_rupiah_format = RazkyFeb::rupiah($totalPrice);
        $data->total_quantity = $totalQuantity;
        $data->ordered_item = $cart;

        return RazkyFeb::responseSuccessWithData(
            200, 1, 1, "OK", "OK", $data);
    }

    function store(Request $request)
    {
        $object = new FoodCartCacheMobile();

        $find = FoodCartCacheMobile::where("id_user", '=', $request->id_user)->get();

        foreach ($find as $item) {
            if ($item->id_resto != $request->id_resto) {
                return RazkyFeb::general(
                    422,
                    "Anda Sudah Memiliki Pesanan dengan Restoran Lain",
                    0, 0);
            }
        }

        $user = User::findOrFail($request->id_user);
        $resto = RestaurantDetail::where("id_resto", "=", $request->id_resto)->first();
        $menu = FoodMenu::findOrFail($request->id_menu);

        $object->id_menu = $request->id_menu;
        $object->id_resto = $request->id_resto;
        $object->id_user = $request->id_user;
        $object->notes = $request->notes;
        $object->quantity = $request->quantity;

        if ($object->save()) {
            // IF REQUEST IS FROM API
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200,
                    1,
                    200,
                    "Berhasil Menambah Data",
                    "Success",
                    $object,
                );
            return back()->with(["success" => "Berhasil Menambah Data"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    400,
                    3,
                    400,
                    "Gagal Menambah Data",
                    "Error",
                    ""
                );

            return back()->with(["failed" => "Gagal Menambah Data"]);
        }
    }

    function update(Request $request, $id)
    {
        $object = FoodCartCacheMobile::findOrFail($id);
        $user = User::findOrFail($request->id_user);
        $resto = RestaurantDetail::where("id_resto", "=", $request->id_resto)->first();
        $menu = FoodMenu::findOrFail($request->id_menu);

        $object->id_resto = $request->id_resto;
        $object->id_user = $request->id_user;
        $object->notes = $request->notes;
        $object->quantity = $request->quantity;

        if ($object->update()) {
            // IF REQUEST IS FROM API
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200,
                    1,
                    200,
                    "Berhasil Menambah Data",
                    "Success",
                    $object,
                );
            return back()->with(["success" => "Berhasil Menambah Data"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    400,
                    3,
                    400,
                    "Gagal Menambah Data",
                    "Error",
                    ""
                );
            return back()->with(["failed" => "Gagal Menambah Data"]);
        }
    }

    function changeQuantity(Request $request, $id)
    {
        $object = FoodCartCacheMobile::findOrFail($id);
        $object->quantity = $request->quantity;
        if ($object->save()) {
            // IF REQUEST IS FROM API
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200,
                    1,
                    200,
                    "Berhasil mengubah Quantity",
                    "Success",
                    $object,
                );
            return back()->with(["success" => "Berhasil mengubah Quantity"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    400,
                    3,
                    400,
                    "Gagal mengubah quantity Data",
                    "Error",
                    ""
                );
            return back()->with(["failed" => "Gagal mengubah Quantity"]);
        }
    }

    function destroy(Request $request, $id)
    {
        $object = FoodCartCacheMobile::findOrFail($id);
        if ($object->delete()) {
            // IF REQUEST IS FROM API
            if ($request->is('api/*'))
                return RazkyFeb::responseSuccessWithData(
                    200,
                    1,
                    200,
                    "Berhasil Menambah Data",
                    "Success",
                    $object,
                );
            return back()->with(["success" => "Berhasil Menambah Data"]);
        } else {
            if ($request->is('api/*'))
                return RazkyFeb::responseErrorWithData(
                    400,
                    3,
                    400,
                    "Gagal Menghapus Data",
                    "Error",
                    ""
                );

            return back()->with(["failed" => "Gagal Menghapus Data"]);
        }
    }


}
