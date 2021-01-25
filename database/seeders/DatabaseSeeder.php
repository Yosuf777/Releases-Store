<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'Yousef',
        //     'email' => 'yousef'.'@gmail.com',
        //     'password' => 12345,
        // ]);
       
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('releases')->insert([
            'name' => Str::random(10),
            'description' =>Str::random(10),
            'username' => Str::random(10),

        ]);
DB::table('pages')->insert([
            'body' =>Str::random(10),

        ]);
        
        DB::table('tags')->insert([
             'name' => Str::random(10),

         ]);
        
    }
}
