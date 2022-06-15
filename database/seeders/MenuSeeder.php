<?php

namespace Database\Seeders;

use App\Models\CuisineCategory;
use App\Models\FoodMenu;
use App\Models\Menu;
use App\Models\RestaurantCategory;
use App\Models\RestaurantDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // for ROTI-O CUISINE : PASTRY-2
        $this->insertData(
            'Chocolate Pastry',
            1,
            "Croissant isi coklat lumer di mulut",
            1,
            2,
            "/rotio/croissant_choc.jpg",
            9000
        );

        // for ROTI-O CUISINE : PASTRY-2
        $this->insertData(
            'Cheese Croissant',
            1,
            "Croissant isi keju mozarella leleh lezat",
            1,
            2,
            "/rotio/368.png",
            6000
        );

        // for ROTI-O ID=1
        $this->insertData(
            'Tuna Croissant',
            1,
            "Croissant isi Tuna segar dari laut new zealend",
            1,
            2,
            "/rotio/croissant_tuna.jpg",
            7000
        );

        // for ROTI-O ID=1
        $this->insertData(
            'Cold Ice Tea',
            1,
            "Es Teh Manis Dingin",
            1,
            3,
            "/rotio/tea.jpg",
            7000
        );

        $this->insertData(
            'Bubur Phitan',
            3,
            "Bubur Ayam Phitan Khas Ta'wan",
            1,
            4,
            "/tawan/bubur_phitan.jpg",
            16400
        );

        $this->insertData(
            'Bubur Udang',
            3,
            "Bubur Ayam Udang Khas Ta'wan",
            1,
            4,
            "/tawan/bubur_udang.jpg",
            17000
        );

        $this->insertData(
            'Cumi Goreng Tepung',
            3,
            "Cumi Goreng Tepung",
            1,
            5,
            "/tawan/cumi_goreng_tepung.jpg",
            37000
        );

        $this->insertData(
            'Es Doger',
            3,
            "Es Doger Khas Bumiayu",
            1,
            6,
            "/tawan/ice_doger.jpg",
            12000
        );

        $this->insertData(
            'Es Teh Manis',
            3,
            "Es Teh Manis",
            1,
            6,
            "/tawan/ice_tea.jpg",
            6000
        );

        $this->insertData(
            'Kakap Asam Manis',
            3,
            "Ikan Kakap dengan Bumbu Asam Manis",
            1,
            5,
            "/tawan/kakap_asam_manis.jpg",
            7000
        );

        $this->insertData(
            'Kepiting Lemburi',
            3,
            "Kepiting Goreng khas Lemburi, Segar dari teluk New Zealand",
            1,
            5,
            "/tawan/kepiting_lemburi.jpg",
            33000
        );

        $this->insertData(
            'Kerang Hijau Rebus',
            3,
            "Kerang Hijau dengan siraman bumbu bangkok, diambil dari laut Jakarta",
            1,
            5,
            "/tawan/krijo_rebus.jpg",
            15000
        );


        $this->insertData(
            'Lumpia Udang',
            3,
            "Lumpia isi Udang Khas Surabaya",
            1,
            5,
            "/tawan/lumpia_udang.jpg",
            95000
        );

        $this->insertData(
            'Nasi Goreng Seafood',
            3,
            "Nasi Goreng Seafood khas Ta'wan dengan udang, kepiting, teri, dan lain-lain",
            1,
            5,
            "/tawan/nasi_goreng_seafood.jpg",
            17000
        );

        $this->insertData(
            'Nasi Putih',
            3,
            "Nasi Putih Hangat",
            1,
            5,
            "/tawan/nasi_putih.jpg",
            5000
        );


    }

    function insertData($name, $idresto, $desc, $isvisible, $idcuisine, $thumbnails,$price)
    {
        $data = new FoodMenu();
        $data->id_resto = $idresto;
        $data->id_cuisine = $idcuisine;
        $data->name = $name;
        $data->thumbnail = "razky_samples/resto/menu".$thumbnails;
        $data->desc = $desc;
        $data->is_visible = $isvisible;
        $data->price = $price;
        $data->save();
    }


}
