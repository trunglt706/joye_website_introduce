<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Illuminate\Console\Command;

class add_contact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add_contact';

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
        Contact::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'a@gmail.com',
            'comment' => 'Xin chào quý đơn vị, chúng tôi cần liên hệ để mua dịch vụ của quý đơn vị. Xin liên hệ với tôi qua số điện thoại sau đây: 090902xxx'
        ]);
    }
}
