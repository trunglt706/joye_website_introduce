<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_feedback extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->delete();
        for ($i = 0; $i < 6; $i++) {
            Customer::create([
                'name' => 'Ms. Khánh Duy',
                'image' => 'style2/images/Avatars.png',
                'description' => 'JOYE đã làm cho các buổi livestream của chúng tôi trở nên sống động và cuốn hút hơn!
                                        Nhờ sự sáng tạo và chuyên nghiệp của đội ngũ, lượng tương tác và đơn hàng đều tăng
                                        vượt bậc.
                                        Tôi rất hài lòng',
                'position' => 'HKSV VN'
            ]);
        }
    }
}
