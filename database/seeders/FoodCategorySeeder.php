<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $this->insertRestaurantCategory(
            'Fast Food',
            'fast_food.jpg',
            '088223738709',
            true
        );

        //2
        $this->insertRestaurantCategory(
            'Bakery and Cake',
            'bakery_and_cake.jpg',
            'Roti dan Kue',
            true
        );

        //3
        $this->insertRestaurantCategory(
            'Coffe and Desert',
            'coffe_and_desert.jpg',
            'Kopi dan Hidangan Penutup Lainnya',
            true
        );

        //4
        $this->insertRestaurantCategory(
            'Chinese Food',
            'chinese_food.jpg',
            'Masakan Chinese',
            true
        );

        //5
        $this->insertRestaurantCategory(
            'Korean Food',
            'korean.jpg',
            'Masakan Korea',
            true
        );

        //6
        $this->insertRestaurantCategory(
            'Indonesian Food',
            'chinese.jpg',
            'Masakan Korea',
            true
        );
    }

    function insertRestaurantCategory($name,$thumbnail,$desc,$isvisible){
        $data = new RestaurantCategory();
        $data->name = $name;
        $data->thumbnail= "/razky_samples/".$thumbnail;
        $data->description = $desc;
        $data->is_visible = $isvisible;
        $data->save();
    }

}
