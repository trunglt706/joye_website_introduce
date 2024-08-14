<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogGroup;

class BlogController extends Controller
{
    /**
     * Chuyến đến trang danh sách bài viết
     * Hiển thị danh sách danh mục bài viết mới nhất
     * Hiển thị danh sách bài viết mới nhất
     */
    public function index()
    {
        $group = request('group', '');
        $search = request('search', '');
        $blogs = Blog::ofStatus(Blog::STATUS_ACTIVE);
        if ($group != '') {
            $group = BlogGroup::ofSlug($group)->first();
            if (!is_null($group)) {
                $blogs = $blogs->groupId($group->id);
            }
        }
        if ($search != '') {
            $blogs = $blogs->search($search);
        }
        $data = [
            'groups' => BlogGroup::withCount('blogs')->ofStatus(BlogGroup::STATUS_ACTIVE)->latest()->get(),
            'blogs' => $blogs->latest()->select('id', 'image', 'slug', 'name', 'created_at', 'description')->paginate(4)
        ];
        return view('guest.blog.index', compact('data'));
    }

    /**
     * Chuyến đến trang chi tiết bài viết
     * Hiển thị thêm 5 bài viết liên quan, cùng danh mục
     */
    public function detail($slug)
    {
        $blog = Blog::ofStatus(Blog::STATUS_ACTIVE)->ofSlug($slug)->firstOrFail();
        $data = [
            'blog' => $blog,
            'other' => Blog::ofStatus(Blog::STATUS_ACTIVE)->where('id', '<>', $blog->id)->where('group_id', $blog->group_id)->select('id', 'slug', 'name', 'image')->limit(5)->get()
        ];
        return view('guest.blog.detail', compact('data'));
    }
}
