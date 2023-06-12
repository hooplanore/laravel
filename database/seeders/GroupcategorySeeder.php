<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupcategories')->insert([
            ['name' => 'ADV','price' => 10500],
            ['name' => 'Regular','price' => 7400],
            ['name' => 'Pre','price' => 6500],
            ['name' => 'Jr','price' => 5500],
            ['name' => 'Kinder','price' => 5500],
            ['name' => 'Short','price' => 5500]
        ]);
    }
}
 