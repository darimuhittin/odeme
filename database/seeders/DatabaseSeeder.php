<?php

namespace Database\Seeders;

use App\Models\Odeme;
use Database\Factories\OdemeFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
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

        Odeme::factory(10)->create();
        Odeme::factory(3)->create([
            'cari_id' => 1
        ]);
        Odeme::factory(4)->create([
            'cari_id' => 2
        ]);
        Odeme::factory(2)->create([
            'cari_id' => 3
        ]);

        User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
