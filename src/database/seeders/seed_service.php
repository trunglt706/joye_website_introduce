<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_service extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->delete();
        Service::create([
            'name' => 'Dịch vụ livestream',
            'image' => asset('img/service/livestream.png')
        ]);
        Service::create([
            'name' => 'Xây kênh trên các nền tảng social',
            'image' => asset('img/service/social.png')
        ]);
        Service::create([
            'name' => 'Xây kênh và quản lý shop online',
            'image' => asset('img/service/shop-online.png')
        ]);
        Service::create([
            'name' => 'Affiliate',
            'image' => asset('img/service/afiliate.png')
        ]);
        Service::create([
            'name' => 'Booking KOL/KOC',
            'image' => asset('img/service/kol-koc.png')
        ]);
        Service::create([
            'name' => 'Quay phim chụp ảnh tư liệu',
            'image' => asset('img/service/quay-phim.png')
        ]);
        Service::create([
            'name' => 'Quảng cáo thương hiệu trên social, E-Commerce',
            'image' => asset('img/service/tiktok.png')
        ]);
    }
}
