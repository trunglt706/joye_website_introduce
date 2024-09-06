@extends('guest.layout2')
@section('title', 'Blog')
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
                        <li><a href="#"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-3 page-blog">
            <div class="container">
                <div class="row">
                    @foreach ($data['blogs'] as $item)
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                                <div class="chanl-single">
                                    <img src="{{ $item->image ?? asset('img/service/livestream.png') }}" class="img-fluid"
                                        alt="">
                                    <div class="chanl-cont">
                                        <div class="title">{{ $item->name }}</div>
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
