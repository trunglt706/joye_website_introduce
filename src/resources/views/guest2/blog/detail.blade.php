@extends('guest2.layout')
@section('title', $data->name)
@section('keywords', '')
@section('description', $data->description)
@section('image', get_url($data->image))
@section('content')
    <main class="bg-grey service">
        <div class="bl-breadcrumb">
            <div class="container">
                <div class="outer">
                    <a href="{{ route('v2.home') }}">Trang chủ</a><label>/</label>
                    <a href="{{ route('v2.blog') }}">Blog</a><label>/</label>
                    <span>{{ $data->name }}</span>
                </div>
            </div>
        </div>
        <div class="bl-blog-detail-title">
            <div class="container">
                <div class="date">
                    <label>SEO</label>
                    <span>{{ date('H:i:s d/m/Y', strtotime($data->created_at)) }}</span>
                </div>
                <h1>{{ $data->name }}</h1>
            </div>
        </div>
        @if ($data->background)
            <div class="banner-blog">
                <div class="container">
                    <img src="{{ get_url($data->background) }}" alt="{{ $data->name }}">
                </div>
            </div>
        @endif
        <div class="bl-blog-detail-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="list-link">
                            <div class="title-head">Mục lục</div>
                            <div class="list">
                                {!! $data->muc_luc !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-long-content">
                            {!! $data->content !!}
                        </div>
                        <div class="bl-SNS">
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        <div class="relative-post">
            <div class="container">
                <div class="title-head">Bài viết liên quan</div>
                <div class="row">
                    @foreach ($list as $item)
                        <div class="col-lg-4">
                            <div class="bl-item-5">
                                <div class="name-project">{{ $item->group_name }}</div>
                                <div class="img">
                                    <a href="{{ route('v2.blog.detail', $item->slug) }}"><img
                                            src="{{ get_url($item->image) }}" alt="{{ $item->name }}"></a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="{{ route('v2.blog.detail', $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="description">
                                    {{ $item->description }}
                                </div>
                                <div class="view-more">
                                    <a href="{{ route('v2.blog.detail', $item->slug) }}">
                                        Xem chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
