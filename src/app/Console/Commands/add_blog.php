<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\BlogGroup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class add_blog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add_blog';

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
        DB::table('blogs')->delete();
        DB::table('blog_groups')->delete();

        $group = BlogGroup::create([
            'name' => 'Tiêu đề mẫu'
        ]);
        BlogGroup::create([
            'name' => 'Tiêu đề 2'
        ]);
        for ($i = 0; $i < 15; $i++) {
            $name = "Turn Your Apps Into Money Machines - Top 5 Ideas For a Best Selling App $i";
            Blog::create([
                'name' => $name,
                'group_id' => $group->id,
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.',
                'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.',
                'status' => Blog::STATUS_ACTIVE,
            ]);
        }
    }
}
