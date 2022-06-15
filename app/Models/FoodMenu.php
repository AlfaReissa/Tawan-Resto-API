<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    use HasFactory;

    protected $appends = ['thumbnail_url','thumbnail2_url'];

    function getThumbnailUrlAttribute(){
        return url("/")."/".$this->thumbnail;
    }

    function getThumbnail2UrlAttribute(){
        return url("/")."/".$this->thumbnail2;
    }
}
