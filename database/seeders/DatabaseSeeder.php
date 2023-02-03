<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
            'name' => 'Dmitri Kypr',
            'email' => 'dima@gmail.com'
        ]);

        Animal::factory(6)->create([
            'user_id' => $user->id
        ]);


    }
}
