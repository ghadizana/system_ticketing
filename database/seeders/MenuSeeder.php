<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'idMenu' => 1,
                'namaMenu' => 'Master User',
                'baseUrl' => '/master-user',
                'label' => 'masterUser',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idMenu' => 2,
                'namaMenu' => 'Grup User',
                'baseUrl' => '/grup-user',
                'label' => 'grupUser',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idMenu' => 3,
                'namaMenu' => 'Akses Menu',
                'baseUrl' => '/akses-menu',
                'label' => 'aksesMenu',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idMenu' => 4,
                'namaMenu' => 'Menu',
                'baseUrl' => '/menu',
                'label' => 'menu',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
