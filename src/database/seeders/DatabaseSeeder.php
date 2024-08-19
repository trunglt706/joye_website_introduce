<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(seed_admin::class);
        $this->call(seed_admin_menu::class);
        $this->call(seed_setting::class);
        $this->call(seed_service::class);
        $this->call(seed_social::class);
    }
}
