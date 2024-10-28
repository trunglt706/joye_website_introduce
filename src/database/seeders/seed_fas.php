<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_fas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->delete();
        Question::create([
            'name' => 'Tại sao chọn JoyE làm đối tác chiến lược?',
            'description' => 'JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp với đội ngũ chuyên gia giàu kinh
                            nghiệm.
                            Chúng tôi không chỉ cung cấp dịch vụ chất lượng mà còn đồng hành với
                            doanh nghiệp trong hành trình phát triển dài hạn,
                            đảm bảo tối ưu hiệu quả và tăng trưởng bền vững.'
        ]);
    }
}
