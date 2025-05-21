<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Exemple de création automatique d'utilisateurs (désactivé ici)
        // \App\Models\User::factory(10)->create();

        // Ajout de ton propre seeder personnalisé
        $this->call([
            UserSeeder::class,
        ]);
    }
}
