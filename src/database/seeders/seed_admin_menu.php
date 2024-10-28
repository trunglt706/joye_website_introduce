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
            'route_name' => 'admin.index',
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
            'route_name' => 'admin.admin.index',
            'active_route_name' => json_encode(['admin.admin.index', 'admin.admin.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $admin->id,
            'name' => 'Lịch sử hoạt động',
            'route_name' => 'admin.log_action.index',
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
            'name' => 'Danh mục blog',
            'route_name' => 'admin.blog_group.index',
            'active_route_name' => json_encode(['admin.blog_group.index', 'admin.blog_group.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $blog->id,
            'name' => 'Danh sách blog',
            'route_name' => 'admin.blog.index',
            'active_route_name' => json_encode(['admin.blog.index', 'admin.blog.detail'])
        ]);

        // Quản lý dich vụ
        $service = AdminMenu::create([
            'name' => 'Quản lý nội dung',
            'icon' => 'layers',
            'active_route_name' => json_encode(['admin.service.index', 'admin.service.detail', 'admin.service_group.index', 'admin.service_group.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $service->id,
            'name' => 'Danh mục dịch vụ',
            'route_name' => 'admin.service_group.index',
            'active_route_name' => json_encode(['admin.service_group.index', 'admin.service_group.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $service->id,
            'name' => 'Danh sách dịch vụ',
            'route_name' => 'admin.service.index',
            'active_route_name' => json_encode(['admin.service.index', 'admin.service.detail'])
        ]);

        // Quản lý content
        $content = AdminMenu::create([
            'name' => 'Quản lý nội dung',
            'icon' => 'copy',
            'active_route_name' => json_encode(['admin.partner.index', 'admin.partner.detail', 'admin.faq.index', 'admin.faq.detail', 'admin.project.index', 'admin.project.detail', 'admin.customer.index', 'admin.customer.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Quản lý dự án',
            'route_name' => 'admin.project.index',
            'active_route_name' => json_encode(['admin.project.index', 'admin.project.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Quản lý đối tác',
            'route_name' => 'admin.partner.index',
            'active_route_name' => json_encode(['admin.partner.index', 'admin.partner.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Khách hàng nói gì',
            'route_name' => 'admin.customer.index',
            'active_route_name' => json_encode(['admin.customer.index', 'admin.customer.detail'])
        ]);
        AdminMenu::create([
            'parent_id' => $content->id,
            'name' => 'Câu hỏi thường gặp',
            'route_name' => 'admin.faq.index',
            'active_route_name' => json_encode(['admin.faq.index', 'admin.faq.detail'])
        ]);

        // Quản lý khác
        $cog = AdminMenu::create([
            'name' => 'Quản lý khác',
            'icon' => 'cog',
            'active_route_name' => json_encode(['admin.contact.index', 'admin.contact.detail', 'admin.setting.index'])
        ]);
        AdminMenu::create([
            'parent_id' => $cog->id,
            'name' => 'Cài đặt',
            'route_name' => 'admin.setting.index',
            'active_route_name' => json_encode(['admin.setting.index'])
        ]);
        AdminMenu::create([
            'parent_id' => $cog->id,
            'name' => 'Danh sách liên hệ',
            'route_name' => 'admin.contact.index',
            'active_route_name' => json_encode(['admin.contact.index', 'admin.contact.detail'])
        ]);
    }
}
