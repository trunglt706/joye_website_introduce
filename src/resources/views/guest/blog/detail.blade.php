@extends('guest.layout2')
@section('title', $data['blog']->name)
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>{{ $data['blog']->name }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li>Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-media">
                                <img src="/style/images/blog-2.jpg" class="img-fluid" alt="{{ $data['blog']->name }}">
                            </div>
                            <div class="post-cont">
                                <h3 class="mt-2">
                                    {{ $data['blog']->name }}
                                </h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <i class="fa fa-user"></i> Admin
                                        <span class="maydate ms-3"><i class="fa fa-calendar-alt"></i>
                                            {{ date('d/m/Y', strtotime($data['blog']->created_at)) }}</span>
                                    </h6>
                                    <div class="footer-social text-end">
                                        <ul>
                                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    {!! $data['blog']->content !!}
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->

                        <!--Relative Post-->
                        <section>
                            <div class="row">
                                <!--start section heading-->
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h2>Bài viết liên quan</h2>
                                    </div>
                                </div>
                                <!--end section heading-->
                            </div>
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="chanl-single">
                                            <img src="/style/images/chanl-img-3.jpg" class="img-fluid" alt="">
                                            <div class="chanl-cont">
                                                <p>MLB Network | Live now</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </section>
                    </div>
                    <!--start blog sidebar-->
                    @include('guest.blog.sidebar')
                    <!--end blog sidebar-->
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
