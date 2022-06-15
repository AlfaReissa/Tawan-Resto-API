<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use App\Models\RestaurantDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class RestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData(
            'Roti O Stasiun Bekasi',
            '1',
            -6.254435746739889,
            107.0193267629354,
            "Jalan Stasiun No 33, Bekasi, Jawa Barat",
            '/razky_samples/resto/rotio_large.jpg',
            '/razky_samples/resto/rotio.jpg',
            "Roti O Harum Enak Sekali",
            true,
            3
        );

        $this->insertData(
            'Bakmi Laris Grandwisata',
            '2',
            -6.420753476303772, 107.12449463932795,
            "Pasirranji, Kec. Cikarang Pusat, Kabupaten Bekasi, Jawa Barat",
            '/razky_samples/resto/bakmi_laris_large.jpg',
            '/razky_samples/resto/bakmi_laris_icon.jpg',
            "Roti O Harum Enak Sekali",
            true,
            4
        );

        $this->insertData(
            'Ta`wan Restaurant',
            3,
            -6.420753476303772, 107.12449463932795,
            "Bojonggede, Bogor. Jawa Barat",
            '/razky_samples/resto/ta wan_large.jpg',
            '/razky_samples/resto/ta wan.jpg',
            "Roti O Harum Enak Sekali",
            true,
            4
        );

    }

    function insertData($name,$idresto,$lat,$long, $address, $thumbnail,$icon, $desc, $isvisible,
    $categori)
    {
        $data = new RestaurantDetail();
        $data->id_resto = $idresto;
        $data->resto_name = $name;
        $data->resto_description = $desc;
        $data->resto_address = $address;
        $data->lat = $lat;
        $data->long = $long;
        $data->thumbnail = $thumbnail;
        $data->icon = $icon;
        $data->is_visible = $isvisible;
        $data->resto_category = $categori;
        $data->save();
    }

}
