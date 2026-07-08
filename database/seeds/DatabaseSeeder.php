<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

require_once __DIR__ . '/ProjectSeeder.php';

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Diemas Burhan Septian',
            'email' => 'admin@lpkia.ac.id',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
        ]);

        $this->call(ProjectSeeder::class);
    }
}