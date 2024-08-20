<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_project extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->delete();
        Project::create([
            'name' => 'Hoa khoi SVVN',
            'image' => asset('style/images/project/hoakhoisv.png'),
            'description' => 'Tổ chức vận hành và triển khai chương trình'
        ]);
        Project::create([
            'name' => 'Dell',
            'image' => asset('style/images/project/dell.png'),
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT'
        ]);
        Project::create([
            'name' => 'Safaby',
            'image' => asset('style/images/project/safabay.png'),
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT'
        ]);
        Project::create([
            'name' => 'Hobe Bar',
            'image' => asset('style/images/project/hobe-bar.png'),
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT'
        ]);
        Project::create([
            'name' => 'Nangsen Farm',
            'image' => asset('style/images/project/nangsen.png'),
            'description' => 'Triển khai đồng bộ livestream và các chiến dịch tiếp thị liên kết'
        ]);
        Project::create([
            'name' => 'Liti Baby',
            'image' => asset('style/images/project/lili-baby.png'),
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT'
        ]);
    }
}
