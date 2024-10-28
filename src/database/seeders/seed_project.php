<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ServiceGroup;
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

        $service_group = ServiceGroup::first();
        Project::create([
            'group_id' => $service_group->id,
            'name' => 'Dell',
            'image' => 'style2/images/project/Project.png',
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT',
            'truy_cap' => '18.74%',
            'doanh_thu' => 'x3'
        ]);
        Project::create([
            'group_id' => $service_group->id,
            'name' => 'Hoa Khôi SVVN',
            'image' => 'style2/images/project/Project.png',
            'description' => 'Tổ chức vận hành và triển khai chương trình',
            'truy_cap' => '18.74%',
            'doanh_thu' => 'x3'
        ]);
        Project::create([
            'group_id' => $service_group->id,
            'name' => 'Nangsen Farm',
            'image' => 'style2/images/project/Project.png',
            'description' => 'Triển khai Livestream và các chiến dịch tiếp thị liên kết',
            'truy_cap' => '18.74%',
            'doanh_thu' => 'x3'
        ]);
        Project::create([
            'group_id' => $service_group->id,
            'name' => 'Hobe Bar',
            'image' => 'style2/images/project/Project.png',
            'description' => 'Đồng hành cùng nhãn hàng trong tất cả các hoạt động TMĐT',
            'truy_cap' => '18.74%',
            'doanh_thu' => 'x3'
        ]);
    }
}
