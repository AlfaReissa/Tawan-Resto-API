<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertUser(
            'Roti O Stasiun Bekasi',
            '2',
            '088223738702',
            'rotiobekasi@gmail.com',
            '/razky_samples/rotio.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Bakmie Laris Grand Wisata",
            "2",
            '088223738703',
            'bakmilaris@gmail.com',
            '/razky_samples/bakmi.webp',
            bcrypt('password')
        );

        $this->insertUser(
            "Ta'wan Chinese Food",
            "2",
            '088223738704',
            'tawan@gmail.com',
            '/razky_samples/resto/ta wan.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Muhammad Firriezky',
            '1',
            '088223738709',
            'firriezky@gmail.com',
            '/razky_samples/firriezky.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Raffey Cassidy',
            '3',
            '082113530900',
            'cassidy@gmail.com',
            '/razky_samples/cassidy.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Valezka',
            '3',
            '082113530901',
            'valezka@gmail.com',
            '/razky_samples/valezka.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Anya Taylor Joy',
            '3',
            '082113530902',
            'anya@gmail.com',
            '/razky_samples/anya.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Ismi Nur Hidayah',
            '3',
            '082113530903',
            'ismin@gmail.com',
            '/razky_samples/ismi.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Manyunyu",
            "3",
            '088223738709',
            'manyunyu@gmail.com',
            '/razky_samples/manyunyu.jpg',
            bcrypt('password'),"",""
        );

    }

    function insertUser(
        $name, $role, $contact, $email, $photo, $password
    )
    {
        $user = new User();
        $user->name = $name;
        $user->role = $role;
        $user->contact = $contact;
        $user->email = $email;
        $user->photo = $photo;
        $user->password = $password;
        $user->save();
    }
}
