@php
    $list = $data['blogs'];
@endphp
@extends('guest.layout2')
@section('title', 'Danh sách bài viết')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Blog</h2>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li>Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($list as $item)
                            <div class="blog-single">
                                <div class="post-media">
                                    <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                                        <img src="/style/images/blog-1.jpg" class="img-fluid" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="post-cont">
                                    <h3>
                                        <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                    <h6>
                                        <i class="fa fa-user"></i> Admin
                                        <span class="maydate ms-3"><i class="fa fa-calendar-alt"></i>
                                            {{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                                    </h6>
                                    <p>
                                        {{ $item->description }}
                                    </p>
                                    <div class="post-btn">
                                        <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                                            Xem thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @include('guest.general.pagination')
                    </div>
                    @include('guest.blog.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
