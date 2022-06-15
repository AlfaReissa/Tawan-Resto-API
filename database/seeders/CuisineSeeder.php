<?php

namespace Database\Seeders;

use App\Models\CuisineCategory;
use App\Models\RestaurantCategory;
use App\Models\RestaurantDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // for ROTI-O ID=1
        //1
        $this->insertData(
            'Bread',
            1,
            "Roti Hangat dan Enak",
            1,
        );

        // for ROTI-O ID=1
        //2
        $this->insertData(
            'Pastry',
            1,
            "Roti Hangat dan Enak",
            1,
        );

        // for ROTI-O ID=1
        //3
        $this->insertData(
            'Coffe and Drink',
            1,
            "Minuman",
            1
        );

        // for Tawan id=3
        //4
        $this->insertData(
            'Porridge/Bubur Ayam',
            3,
            "Hidangan Bubur Ayam",
            1
        );

        // for Tawan id=3
        //5
        $this->insertData(
            'Seafood',
            3,
            "Hidangan Laut Segar",
            1
        );

        // for Tawan id=3
        //6
        $this->insertData(
            'Drinks and Beverage',
            3,
            "Hidangan Bubur Ayam",
            1
        );

    }

    function insertData($name,$idresto,$desc, $isvisible)
    {
        $data = new CuisineCategory();
        $data->id_resto = $idresto;
        $data->name = $name;
        $data->desc = $desc;
        $data->is_visible = $isvisible;
        $data->save();
    }


}
