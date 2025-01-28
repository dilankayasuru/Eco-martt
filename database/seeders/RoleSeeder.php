<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 3, 'name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Supplier', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Customer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
