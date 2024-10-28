<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_service extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->delete();
        DB::table('service_groups')->delete();

        $group = ServiceGroup::create([
            'icon' => 'style2/images/trend-up.png',
            'name' => 'Ecommerce',
            'image' => 'style2/images/service/Ecommerce.jpg',
            'description' => "Giúp doanh nghiệp tăng trưởng vượt bậc, đảm bảo mọi khía cạnh kinh doanh trực tuyến đều
                                được chăm sóc chu đáo
                                <ul>
                                    <li>Tư vấn chiến lược bán hàng tối ưu</li>
                                    <li>Quản lý gian hàng và tối ưu trải nghiệm khách hàng</li>
                                    <li>Phân tích dữ liệu để cải thiện hiệu quả bán hàng</li>
                                </ul>"
        ]);
        ServiceGroup::create([
            'icon' => 'style2/images/video-play.png',
            'name' => 'Xây dựng nội dung',
            'image' => 'style2/images/service/Content.png',
            'description' => "Dịch vụ sáng tạo nội dung chuyên nghiệp giúp thương hiệu của bạn nổi bật trên mọi nền tảng
                                <ul>
                                    <li>Sản xuất nội dung đa dạng (video, hình ảnh, bài viết)</li>
                                    <li>Chỉnh sửa chuyên nghiệp với thiết bị hiện đại</li>
                                    <li>Phân tích và điều chỉnh chiến lược nội dung theo thị trường</li>
                                </ul>"
        ]);
        ServiceGroup::create([
            'icon' => 'style2/images/microphone-2.png',
            'name' => 'Livestream',
            'image' => 'style2/images/service/Livestream.png',
            'description' => "Thiết bị hiện đại và nội dung sáng tạo, giúp bạn tối ưu hóa tương tác và chuyển đổi:
                                <ul>
                                    <li>Livestream đa nền tảng</li>
                                    <li>Xây dựng kịch bản, thiết bị cao cấp</li>
                                    <li>Cung cấp báo cáo phân tích</li>
                                </ul>"
        ]);
        ServiceGroup::create([
            'icon' => 'style2/images/book.png',
            'name' => 'Đào tạo chuyên sâu',
            'image' => 'style2/images/service/DaoTao.png',
            'description' => "Cung cấp các khóa đào tạo chuyên sâu, nâng cao năng lực cá nhân và đội nhóm qua những buổi
                                học thực tiễn
                                <ul>
                                    <li>Đào tạo từ cơ bản đến nâng cao</li>
                                    <li>Tư vấn chiến lược và các thực hiện hiệu quả</li>
                                    <li>Kết nối và học hỏi từ cộng đồng chuyên gia</li>
                                </ul>"
        ]);

        for ($i = 0; $i < 10; $i++) {
            Service::create([
                'name' => 'Dịch vụ Livestream ' . $i,
                'group_id' => $group->id,
                'image' => 'style2/images/service/Service.png',
                'description' => 'Livestream trên các nền tảng social và ecommerce như Tiktok, Facebook và Shopee',
                'price' => '<ul>
                                    <li>Phòng livestream</li>
                                    <li>Thiết bị hiện đại</li>
                                    <li>Host tiêu chuẩn</li>
                                    <li>Dịch vụ vận hành chuyên nghiệp</li>
                                    <li>Khung giờ linh động</li>
                                </ul>',
                'content' => '<p>1 Phòng Live: </p>
                                    <ul>
                                        <li>Diện tích: 9-10 m2</li>
                                        <li>Set-up ánh sáng </li>
                                        <li>Điện thoại </li>
                                        <li>Thiết bị: </li>
                                    </ul>
                                    02 Đèn Softbox Godox, có lưới tổ ong <br />
                                    01 Đèn led vuông<br />
                                    01 Chân máy livestream điện thoại<br />
                                    01 Thiết bị live: iPhone <br />
                                    01 Background tiêu chuẩn <br />
                                    01 Mic DJI<br />
                                    <p>2. Host tiêu chuẩn </p>
                                    <ul>
                                        <li>Những bạn Streamer tiêu chuẩn sẽ được đào tạo chuyên nghiệp và livestream đa
                                            dạng ngành hàng</li>
                                        <li>Có khả năng tương tác và giao tiếp tích cực với khán giả trong thời gian phát
                                            sóng trực tiếp </li>
                                        <li>Luôn theo dõi mục tiêu doanh số và có khả năng chốt đơn hàng </li>
                                    </ul>
                                    <p>3. Dịch vụ vận hành tiêu chuẩn </p>
                                    <ul>
                                        <li>Hỗ trợ Gỡ vi phạm cho kênh/shop (không bao gồm vi phạm nặng so với policy của
                                            Tiktok) </li>
                                        <li>Phân tích các chỉ số sau phiên live, chỉ số kênh, shop  </li>
                                    </ul>
                                    <p>4. Khung giờ</p>
                                    <ul>
                                        <li>Khách hàng chọn phòng live sẽ được sắp xếp theo khung giờ thường + tối thiểu 30%
                                            khung giờ vàng  </li>
                                        <li>Nếu muốn chọn cố định khung giờ sẽ mua thêm phụ phí chọn giờ Quyền lợi của khách
                                            hàng</li>
                                    </ul>',
                'dinh_kem' => '<h3>Menu 1</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat.</p>',
                'cam_ket' => '<h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>'
            ]);
        }
    }
}
