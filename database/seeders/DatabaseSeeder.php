<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sessions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Sessions::create([
             'name' => 'مساج رجلين',
        ]);
        Sessions::create([
             'name' => 'مساج ايدين',
        ]);
        Sessions::create([
             'name' => 'مساج رقبة',
        ]);
        Sessions::create([
             'name' => '',
        ]);
        Sessions::create([
             'name' => 'ليزر للوجه',
        ]);
        Sessions::create([
             'name' => 'كشف اسنان',
        ]);
    }
}
