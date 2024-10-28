<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "id" => Str::uuid(),
            "email" => "3337210999@ugm.ac.id",
            "email_pribadi" => "komar@test.com",
            "nama" => "komar udin",
            "role" => 'alumni',
            'agama'=>'islam',
            'nim' => 2,
            'fakultas' => 'teknik',
            'jurusan' => 'informatika',
           'jenis_kelamin'=>'Laki-Laki',
            'no_hp'=>'08223451',
            'image_path' => 'https://gp1.wac.edgecastcdn.net/802892/http_public_production/artists/images/2653839/original/resize:831x600/crop:x18y2w922h690/aspect:1.0/hash:1473874685/1424112887_383445038462245_7401598962949212558_n.jpg?1473874685',
            "password" => Hash::make("somesecretpassword"),
            "token" => "test"
        ]);

        User::create([
            "id" => Str::uuid(),
            "email" => "r",
            "email_pribadi" => "root@example.com",
            'jenis_kelamin' => 'Laki-Laki',
            "nama"=>'admin',
            'agama' => 'islam',
            'nim'=>1,
            'fakultas'=>'-',
            'jurusan'=>'-',
            'no_hp' => '0',
            'image_path'=>'-',
            "role" => 'admin',
            "password" => Hash::make("1"),
            "token" => "test2"
        ]);
        User::create([
            "id" => Str::uuid(),
            "email" => "3337210022@untirta.ac.id",
            "email_pribadi" => "rakapengenturu@turu.com",
            "nama" => "raka adi prasetya",
            "role" => 'alumni',
            'agama'=>'islam',
            'nim' => 3,
            'fakultas' => 'teknik',
            'jurusan' => 'informatika',
           'jenis_kelamin'=>'Laki-Laki',
            'no_hp'=>'0869696969',
            'image_path' => 'https://imagedelivery.net/LBWXYQ-XnKSYxbZ-NuYGqQ/4f2744cf-a6d2-4d9c-b741-8ae150f8e400/avatarhd',
            "password" => Hash::make("1"),
            "token" => "test3"
        ]);

        User::factory(1000)->create();
    }
}
