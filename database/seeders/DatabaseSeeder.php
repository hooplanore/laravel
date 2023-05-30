<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Student;
use \App\Models\User;
use \App\Models\Attendance;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            GroupcategorySeeder::class,
            GroupSeeder::class,
            AttendanceSeeder::class,
        ]);


        \App\Models\Group::factory(100)->create();

        $groups = \App\Models\Group::all();

        Student::factory(1000)->create()
        ->each(function(Student $student) use ($groups){
            $student->groups()->attach(
            $groups->random(rand(1,3))->pluck('id')->toArray()
            );
        });

        User::factory(20)->create()
        ->each(function(User $user) use ($groups){
            $user->groups()->attach(
            $groups->random(rand(2,4))->pluck('id')->toArray()
            );
        });

        Attendance::factory(100)->create();
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

}
