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
                                <h6><i class="fa fa-user"></i> Admin
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
                                <div class="mt-2">
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
                                <!--start channel single-->
                                <div class="col-lg-4 col-md-6">
                                    <div class="chanl-single">
                                        <img src="/style/images/chanl-img-3.jpg" class="img-fluid" alt="">
                                        <div class="chanl-cont">
                                            <h5 class="m-0"><a href="">MLB NETWORK</a></h5>
                                            <p>MLB Network | Live now</p>
                                        </div>
                                        <div class="chanl-single-logo">
                                            <a href="#"><img src="/style/images/4.jpg" alt="logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end channel single-->
                                <!--start channel single-->
                                <div class="col-lg-4 col-md-6">
                                    <div class="chanl-single">
                                        <img src="/style/images/chanl-img-4.jpg" class="img-fluid" alt="">
                                        <div class="chanl-cont">
                                            <h5 class="m-0"><a href="">REAL SOCIEDAD V ESPANYOL</a></h5>
                                            <p>Soccer | Watch live at 2:00</p>
                                        </div>
                                        <div class="chanl-single-logo">
                                            <a href="#"><img src="/style/images/5.jpg" alt="logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end channel single-->
                                <!--start channel single-->
                                <div class="col-lg-4 col-md-6">
                                    <div class="chanl-single">
                                        <img src="/style/images/chanl-img-5.jpg" class="img-fluid" alt="">
                                        <div class="chanl-cont">
                                            <h5 class="m-0"><a href="">MASTERS - DAY 3</a></h5>
                                            <p>Snooker | Watch live at 19:00</p>
                                        </div>
                                        <div class="chanl-single-logo">
                                            <a href="#"><img src="/style/images/6.jpg" alt="logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end channel single-->
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
