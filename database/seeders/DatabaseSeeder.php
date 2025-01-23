<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // On seed un utilisateur admin dans la base de données
        User::firstOrCreate(
            ['email' => 'admin@hellocse.com'],
            ['password' => 'password',
            'isAdmin' => '1']
        );

        // On utilise aussi la factory pour rajouter 30 profils aléatoires supplémentaires
        Profile::factory()->count(30)->create();
    }
}
