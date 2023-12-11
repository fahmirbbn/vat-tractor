<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // $this->call(RencanaKerjaSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(NewsTableSeeder::class);
        // $this->call(MasterActivitySeeder::class);
        // $this->call(MasterUnitSeeder::class);
        // $this->call(MasterImplementSeeder::class);
    }
}
