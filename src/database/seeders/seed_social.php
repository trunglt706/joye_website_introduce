<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_social extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('socials')->delete();
        Social::create([
            'name' => 'Facebook',
            'image' => asset('img/social/facebook.jpg'),
            'link' => '',
        ]);
        Social::create([
            'name' => 'Zalo',
            'image' => asset('img/social/zalo.png'),
            'link' => '',
        ]);
        Social::create([
            'name' => 'Hotline',
            'image' => asset('img/social/hotline.png'),
            'link' => '',
        ]);
    }
}
