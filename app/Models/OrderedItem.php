<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    use HasFactory;

    protected $appends = ["order","menu"];
    protected $hidden =["menu_snapshot","order_snapshot"];

    public function getOrderAttribute(){
        return json_decode($this->order_snapshot);
    }

    public function getMenuAttribute(){
        return json_decode($this->menu_snapshot);
    }

}
