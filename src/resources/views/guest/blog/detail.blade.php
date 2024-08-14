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
        <div class="blog-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-media">
                                <img src="/style/images/blog-2.jpg" class="img-fluid" alt="{{ $data['blog']->name }}">
                            </div>
                            <div class="post-cont">
                                <h3>
                                    {{ $data['blog']->name }}
                                </h3>
                                <h6><i class="fa fa-user"></i> Admin
                                    <span class="maydate ms-3"><i class="fa fa-calendar-alt"></i>
                                        {{ date('d/m/Y', strtotime($data['blog']->created_at)) }}</span>
                                </h6>
                                {!! $data['blog']->content !!}
                            </div>
                        </div>
                        <!--end blog single-->
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
