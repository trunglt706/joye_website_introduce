@extends('guest.layout2')
@section('title', 'Tin tức')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Tin tức</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li class="active">Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-3 page-service">
            <div class="container">
                <div class="row">
                    @foreach ($list as $item)
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                                <div class="chanl-single">
                                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                    <div class="chanl-cont">
                                        <div class="mb-2">
                                            <span class="key">NEW BLOG</span>
                                        </div>
                                        <div class="title">{{ $item->name }}</div>
                                        <p class="description">
                                            {{ $item->description ?? 'Xây dựng nội dung chuyên nghiệp nâng cao thương hiệu khách hàng' }}
                                        </p>
                                        <div class="price">
                                            Xem chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
