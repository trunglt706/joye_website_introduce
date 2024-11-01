<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogControllerV2 extends Controller
{

    public function index()
    {
        $g = request('g', '');
        $list = Blog::join('blog_groups', 'blogs.group_id', '=', 'blog_groups.id')->ofStatus(Blog::STATUS_ACTIVE);
        $list = $g != '' ? $list->whereHas('group', function ($q) use ($g) {
            $q->where('slug', $g);
        }) : $list;
        $list = $list->select('blogs.slug', 'blogs.name', 'blogs.image', 'blogs.description', 'blog_groups.name as group_name', 'blogs.created_at')
            ->latest('blogs.created_at')->paginate(6);
        return view('guest2.blog.index', compact('list'));
    }


    public function detail($slug)
    {
        $data = Blog::ofSlug($slug)->ofStatus(Blog::STATUS_ACTIVE)->firstOrFail();
        $list = Blog::join('blog_groups', 'blogs.group_id', '=', 'blog_groups.id')->ofStatus(Blog::STATUS_ACTIVE)
            ->where('blogs.id', '<>', $data->id)->select('blogs.slug', 'blogs.name', 'blogs.image', 'blogs.description', 'blog_groups.name as group_name')
            ->latest('blogs.created_at')->limit(3)->get();
        return view('guest2.blog.detail', compact('data', 'list'));
    }
}
