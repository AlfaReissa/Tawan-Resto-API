<?php

namespace App\Models;

use App\Helper\RazkyFeb;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodInvoice extends Model
{
    use HasFactory;

    protected $appends = [
        "ordered_item",
        "total_price",
        "total_price_rupiah_format",
        "ordered_item_names"
    ];

    function getOrderedItemNamesAttribute()
    {
        $data = $this->getOrderedItemAttribute();

        $retVal = array();
        foreach ($data as $datum) {
            $menuName = $datum->order->menu_name;
            $menuPrice = $datum->order->price;
            $quantity = $datum->order->quantity;
            array_push($retVal, $datum->order->menu_name . " x$quantity" . " Rp." . $datum->order->price);
        }

        return $retVal;
    }

    function getOrderedItemAttribute()
    {
        $orderedItemsRaw = OrderedItem::where('id_invoice', '=', $this->id)->get();
        return $orderedItemsRaw;
    }

    function getTotalPriceAttribute()
    {
        $orderedItems = $this->getOrderedItemAttribute();
        $totalPrice = 0;
        foreach ($orderedItems as $orderedItem) {
            $totalPrice += $orderedItem->order->price_multiplied;
        }

        return $totalPrice;
    }

    function getTotalPriceRupiahFormatAttribute()
    {
        return RazkyFeb::rupiah($this->getTotalPriceAttribute());
    }

    protected $casts = [
        'created_at' => 'date:Y-m-d h:i:s',
        'updated_at' => 'date:Y-m-d h:i:s',
    ];
}
