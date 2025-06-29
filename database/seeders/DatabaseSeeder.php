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
    // Jika ingin pakai factory, bisa tetap disimpan:
    // User::factory(10)->create();

    // Panggil seeder buatanmu di sini
    $this->call([
        UserSeeder::class,
    ]);
}

}
