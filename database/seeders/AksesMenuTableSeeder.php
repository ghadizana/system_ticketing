<?php

namespace Database\Seeders;

use App\Models\AksesMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AksesMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AksesMenu::factory()->count(15)->create();
    }
}
