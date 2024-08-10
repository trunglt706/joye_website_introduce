<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_admin_menu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_menus')->delete();

        // Trang chủ
        AdminMenu::create([
            'name' => 'Trang chủ',
            'route_name' => route('admin.index'),
            'icon' => 'home',
            'active_route_name' => json_encode(['admin.index'])
        ]);

        // Quản lý tài khoản
        $admin = AdminMenu::create([
            'name' => 'Tài khoản quản lý',
            'icon' => 'user',
            'active_route_name' => json_encode(['admin.log_action.index', 'admin.log_action.detail', 'admin.admin.index', 'admin.admin.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $admin->id,
            'name' => 'Danh sách tài khoản',
            'route_name' => route('admin.admin.index'),
            'active_route_name' => json_encode(['admin.admin.index', 'admin.admin.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $admin->id,
            'name' => 'Lịch sử hoạt động',
            'route_name' => route('admin.log_action.index'),
            'active_route_name' => json_encode(['admin.log_action.index', 'admin.log_action.detail'])
        ]);

        // Quản lý blog
        $blog = AdminMenu::create([
            'name' => 'Quản lý blog',
            'icon' => 'book',
            'active_route_name' => json_encode(['admin.blog_group.index', 'admin.blog_group.detail', 'admin.blog.index', 'admin.blog.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $blog->id,
            'name' => 'Nhóm blog',
            'route_name' => route('admin.blog_group.index'),
            'active_route_name' => json_encode(['admin.blog_group.index', 'admin.blog_group.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $blog->id,
            'name' => 'Danh sách blog',
            'route_name' => route('admin.blog.index'),
            'active_route_name' => json_encode(['admin.blog.index', 'admin.blog.detail'])
        ]);

        // Quản lý content
        $content = AdminMenu::create([
            'name' => 'Quản lý nội dung',
            'icon' => 'copy',
            'active_route_name' => json_encode(['admin.service.index', 'admin.service.detail', 'admin.faq.index', 'admin.faq.detail', 'admin.contact.index', 'admin.contact.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Danh sách dịch vụ',
            'route_name' => route('admin.service.index'),
            'active_route_name' => json_encode(['admin.service.index', 'admin.service.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Danh sách liên hệ',
            'route_name' => route('admin.contact.index'),
            'active_route_name' => json_encode(['admin.contact.index', 'admin.contact.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Câu hỏi thường gặp',
            'route_name' => route('admin.faq.index'),
            'active_route_name' => json_encode(['admin.faq.index', 'admin.faq.detail'])
        ]);

        // cài đặt
        AdminMenu::create([
            'name' => 'Cài đặt',
            'route_name' => route('admin.setting.index'),
            'icon' => 'cog',
            'active_route_name' => json_encode(['admin.setting.index'])
        ]);
    }
}
