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
            'value' => asset('assets/images/logo.png')
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-favico',
            'name' => 'Favico website',
            'type' => Setting::TYPE_FILE,
            'value' => asset('assets/images/favico.png')
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-name',
            'name' => 'Tên website',
            'value' => 'Diamontour'
        ]);
        Setting::create([
            'group_id' => $seo->id,
            'code' => 'seo-description',
            'name' => 'Mô tả website',
            'value' => 'Trang chủ Diamondtour Vinh hạnh mang đến trải nghiệm khác biệt trên mỗi hành trình!'
        ]);
    }
}
