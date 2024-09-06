<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_customer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->delete();
        Customer::create([
            'name' => 'Isadora',
            'description' => 'Bách hoá ngon',
            'comment' => 'Kết quả thay đổi rõ rệt sau khi hợp tác với agency. Đội ngũ hỗ trợ tận tình và
                                        giúp tối ưu hóa chiến lược. Kết quả tuyệt vời!',
            'image' => '/style/images/comment1.png'
        ]);
        Customer::create([
            'name' => 'Mr. Nguyên Hữu Thái Hòa',
            'description' => 'Giám đốc Trung Tâm Khoa Học Tư Duy CTS, VIỆN TRÍ VIỆT',
            'comment' => 'Rất hài lòng với dịch vụ của JOYE. Lượng người xem và tương tác trên trang tăng
                                        gấp đôi sau một tháng hợp tác! Rất đáng đầu tư!',
            'image' => '/style/images/comment2.png'
        ]);
        Customer::create([
            'name' => 'Ms. Phương Anh',
            'description' => 'Thuận Hoá Đan Thanh',
            'comment' => 'Đội ngũ tận tình của JoyE đã giúp shop của chúng tôi trên sàn TMĐT được vận hành trơn tru và hiệu quả hơn rất nhiều. Gian hàng đẹp hơn, quảng cáo đúng đối tượng hơn, và doanh thu cũng tăng đáng kể.',
        ]);
        Customer::create([
            'name' => 'Ms. Khánh Vi',
            'description' => 'Bách Hoá Ngon',
            'comment' => 'JoyE đã làm cho các buổi livestream của chúng tôi trở nên sống động và cuốn hút hơn! Nhờ sự sáng tạo và chuyên nghiệp của đội ngũ, lượng tương tác và đơn hàng đều tăng vượt bậc. Tôi rất hài lòng!',
        ]);
    }
}
