<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // On récupère l'utilisateur admin
        $admin = User::query()->where('email', 'admin@hellocse.com')->first();


        // S'il n'existe pas, on le crée
        if(!$admin) 
        {
            User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@hellocse.com',
                'password' => 'password',
            ]);
        }
    }
}
