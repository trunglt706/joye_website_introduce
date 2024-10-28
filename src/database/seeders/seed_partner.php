<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_partner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partners')->delete();
        Partner::create([
            'name' => 'Hobe bar',
            'image' => 'style2/images/hobe bar.png'
        ]);
        Partner::create([
            'name' => 'Dell',
            'image' => 'style2/images/Dell.png'
        ]);
        Partner::create([
            'name' => 'Safabay',
            'image' => 'style2/images/safabay.png'
        ]);
        Partner::create([
            'name' => 'Miss University',
            'image' => 'style2/images/miss.png'
        ]);
        Partner::create([
            'name' => 'Nàng Sen',
            'image' => 'style2/images/nang sen.png'
        ]);
    }
}
