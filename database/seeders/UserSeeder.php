<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id'=> 1, 'name' => 'elisoft', 'email' => 'elisofttech@test.com', 'password' => Hash::make('12345678'), 'status' => 1],
            ['id'=> 2, 'name' => 'jihan', 'email' => 'jihan2208@gmail.com', 'password' => Hash::make('pjdtnwkl'), 'status' => 2],
        ];
        DB::table('users')->insert($data);
    }
}