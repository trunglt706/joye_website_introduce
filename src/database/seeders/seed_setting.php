<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_setting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();
        DB::table('setting_groups')->delete();

        //============= seo
        $seo = SettingGroup::create([
            'code' => 'seo',
            'name' => 'Tổng quan',
            'icon' => '<i class="fas fa-cog"></i>'
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-logo',
            'name' => 'Logo website',
            'type' => Setting::TYPE_FILE,
            'value' => 'uploads/setting/logo.png'
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-favico',
            'name' => 'Favico website',
            'type' => Setting::TYPE_FILE,
            'value' => 'uploads/setting/favico.png'
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-name',
            'name' => 'Tên website',
            'value' => 'Joye'
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-description',
            'name' => 'Mô tả website',
            'value' => 'Nơi cung cấp giải pháp tốt nhất về thương mại điện tử và livestreaming'
        ]);

        //============= about
        $about = SettingGroup::create([
            'code' => 'about',
            'name' => 'Giới thiệu',
        ]);
        Setting::create([
            'group_id' => $about->id,
            'code' => 'about-content',
            'type' => Setting::TYPE_EDITOR,
            'name' => 'Nội dung giới thiệu',
            'value' => 'JoyE là một tổ chức dành giúp những Nhà sáng tạo nội dung và các Doanh nghiệp,
                    Nhãn hàng có thể giới thiệu và cung cấp sản phẩm,
                    dịch vụ của mình tới khách hàng mục tiêu thông qua nền tảng đa phương tiện.
                    <br />
                    Sứ mệnh của chúng tôi là làm cho trải nghiệm của người mua với thương mại điện tử
                    trở nên sáng tạo hơn, vui vẻ hơn. Qua đó, giúp các Nhà sáng tạo nội dung,
                    Nhà bán hàng và các Doanh nghiệp, thương hiệu phát triển và thành công với những gì họ làm.'
        ]);
    }
}
