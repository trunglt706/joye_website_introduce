<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class add_service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add_service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('services')->delete();
        Service::create([
            'name' => 'Dịch vụ livestream',
            'description' => 'Livestream trên các nền tảng social và e-commerce như tiktok, facebook và shopee, bao gồm: Livestream cho nhãn hàng, Livestream mega, Đào tạo về livestream'
        ]);

        Service::create([
            'name' => 'Xây kênh trên các nền tảng social',
            'description' => 'trình thiết lập và phát triển sự hiện diện của doanh nghiệp trên các nền tảng như Facebook, Instagram, TikTok, và YouTube nhằm tiếp cận người xem'
        ]);

        Service::create([
            'name' => 'Xây kênh và quản lý shop online',
            'description' => 'Xây dựng kênh bán hàng trên các nền tảng số như Tiktok, Shopee, Lazada,... Nhằm mục tiêu tạo ra doanh thu cho các nhãn hàng'
        ]);

        Service::create([
            'name' => 'Affiliate',
            'description' => 'Nghiên Cứu và Lựa Chọn Sản Phẩm/Dịch Vụ, Nghiên Cứu và Lựa Chọn Sản Phẩm/Dịch Vụ, Quảng Cáo Trả Phí, Quản Lý và Tối Ưu Hóa Hiệu Suất, Tương Tác Với Đối Tác và Khách Hàng'
        ]);

        Service::create([
            'name' => 'Booking KOL/KOC',
            'description' => 'Tìm kiếm, liên hệ, và hợp tác với các cá nhân có tầm ảnh hưởng trên mạng xã hội nhằm quảng bá sản phẩm hoặc dịch vụ của doanh nghiệp'
        ]);

        Service::create([
            'name' => 'Quay phim chụp ảnh tư liệu',
            'description' => 'Sử dụng dịch vụ quay phim chụp ảnh tư liệu của công ty mang lại nhiều lợi ích vượt trội như chất lượng hình ảnh cao cấp, tiết kiệm thời gian, nâng cao hình ảnh thương hiệu, và tăng tương tác với khách hàng'
        ]);

        Service::create([
            'name' => 'Quảng cáo thương hiệu trên social, E-Commerce',
            'description' => 'Sử dụng các công cụ và chiến lược truyền thông để tăng cường nhận diện thương hiệu, thu hút khách hàng tiềm năng và tăng doanh số bán hàng'
        ]);
    }
}
