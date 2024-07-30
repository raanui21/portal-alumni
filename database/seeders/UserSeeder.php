<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Raka Adi Prasetya',
            'email' => 'raka@gmail.com',
            'password' => Hash::make('naga'),
            'nim' => '69',
            'profile_photo_url' => 'https://i.pinimg.com/564x/89/70/97/8970971130244cf3d9bc3902b28ed383.jpg',
            'fakultas' => 'Teknik',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_lulus' => '2024',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Raka',
            'email' => 'pengenturu',
            'password' => Hash::make('naga'),
            'nim' => 'r',
            'profile_photo_url' => 'https://i.pinimg.com/564x/89/70/97/8970971130244cf3d9bc3902b28ed383.jpg',
            'fakultas' => 'Teknik',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_lulus' => '2024',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'admin',
        ]);
    }
}
