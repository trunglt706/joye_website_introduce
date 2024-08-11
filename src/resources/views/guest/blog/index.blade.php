@extends('guest.layout2')
@section('title','Danh sách bài viết')
@section('keywords','')
@section('description','')
@section('image', '')
@section('content')
     <!--start page content-->
     <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Our Blog</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                        <li><small>></small></li>
                        <li>Blog</li>
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
                                <a href="/tin-tuc/abc"><img src="/style/images/blog-1.jpg" class="img-fluid" alt=""></a>
                            </div>
                            <div class="post-cont">
                                <h3><a href="/tin-tuc/abc">Turn Your Apps Into Money Machines - Top 5 Ideas For a Best Selling App</a></h3>
                                <h6><a href="/tin-tuc/abc"><i class="fa fa-user"></i> Admin</a><span class="maydate"><i class="fa fa-calendar-alt"></i> 14 May 2023</span></h6>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                                <div class="post-btn">
                                    <a href="/tin-tuc/abc">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-media">
                                <a href="/tin-tuc/abc"><img src="/style/images/blog-2.jpg" class="img-fluid" alt=""></a>
                            </div>
                            <div class="post-cont">
                                <h3><a href="/tin-tuc/abc">Turn Your Apps Into Money Machines - Top 5 Ideas For a Best Selling App</a></h3>
                                <h6><a href="/tin-tuc/abc"><i class="fa fa-user"></i> Admin</a><span class="maydate"><i class="fa fa-calendar-alt"></i> 14 May 2023</span></h6>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                                <div class="post-btn">
                                    <a href="/tin-tuc/abc">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-media">
                                <a href="/tin-tuc/abc"><img src="/style/images/blog-3.jpg" class="img-fluid" alt=""></a>
                            </div>
                            <div class="post-cont">
                                <h3><a href="/tin-tuc/abc">Turn Your Apps Into Money Machines - Top 5 Ideas For a Best Selling App</a></h3>
                                <h6><a href="/tin-tuc/abc"><i class="fa fa-user"></i> Admin</a><span class="maydate"><i class="fa fa-calendar-alt"></i> 14 May 2023</span></h6>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                                <div class="post-btn">
                                    <a href="/tin-tuc/abc">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                        @include('guest.general.pagination')
                    </div>
                    @include('guest.blog.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection