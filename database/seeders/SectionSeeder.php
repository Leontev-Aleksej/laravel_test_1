<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::create(['title' => 'Программирование']);
        Section::create(['title' => 'Тестирование']);
        Section::create(['title' => 'Безопасность']);
    }
}