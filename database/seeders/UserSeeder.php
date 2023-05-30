<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'NoreTest',
            'kana' => 'ノリテスト',
            'zip_code' => '7330813',
            'address1' => '広島市',
            'address2' => '西区己斐',
            'tel' => '090-2290-7922',
            'gender' => '1',
            'birthday' => '1980-09-04',
            'auth' => '0',
            'status' => '0',
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
 