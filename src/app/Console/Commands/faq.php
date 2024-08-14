<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class faq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:faq';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('questions')->delete();
        Question::create([
            'name' => 'Joye cung cấp những giải pháp nào?',
            'description' => 'Joye cung cấp các giải pháp tốt nhất về thương mại điện tử (các hình thức kinh doanh theo xu hướng), livestreaming (Đang dần trở thành cách thức bán hàng có doanh số tăng trưởng đột biến nhất trong thời đại kinh tế số)'
        ]);
        Question::create([
            'name' => 'Tại sao lại chọn Joye?',
            'description' => 'JoyE phát triển mạnh mẽ nhờ vào tư duy cởi mở, luôn thử nghiệm và điều chỉnh ý tưởng mới một cách nhanh chóng và tích cực. Chúng tôi mang đến các cơ hội đặc biệt để phát triển nhanh hơn và dẫn đầu xu hướng kinh doanh.'
        ]);
        Question::create([
            'name' => 'Joye đã có những gì?',
            'description' => 'Chúng tôi sở hữu những chuyên gia với năng lực đặc biệt nhất trong lĩnh vực của mình, có những trải nghiệm với rất nhiều các chiến dịch bán hàng cùng các thương hiệu trong và ngoài nước, luôn cập nhật công nghệ mới và ứng dụng cho đối tác của mình với mức độ tiến hóa cao nhất'
        ]);
    }
}
