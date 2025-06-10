<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{


public function run(): void
{
    User::create([
        'name' => 'Admin',
        'tel' => '1234567890',
        'email' => 'admin@mail.com',
        'password' => bcrypt('admin1234'),
    ]);
    $this->call(SectionSeeder::class);
}
}
