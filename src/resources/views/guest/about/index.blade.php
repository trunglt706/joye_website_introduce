@extends('guest.layout2')
@section('title','Giới thiệu')
@section('keywords','')
@section('description','')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Giới thiệu</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                        <li><small>></small></li>
                        <li>Giới thiệu</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-cont">
                                        <h3><a href="#">Giới thiệu</a></h3>
                                        <h6><a href="#"><i class="fa fa-user"></i> Admin</a><span class="maydate"><i class="fa fa-calendar-alt"></i> 14 May 2023</span></h6>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                                        <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-cont">
                                        <div class="about-testimonial">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="img"><img src="/style/images/img-2.jpg" alt=""></div>
                                                    <div class="name">Mr. Nguyễn Văn B</div>
                                                    <div class="mini-text">(10 năm kinh nghiệm trong lĩnh vực quảng cáo)</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="description">
                                                        &ldquo;
                                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla repellat omnis saepe repellendus deserunt
                                                        &rdquo;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="about-feature">
                                    <div class="title">Giá trị khác biệt</div>
                                    <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br/>Delectus repellat non vel! Eum voluptatibus,</div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/img-2.jpg" alt="">
                                                    </div>
                                                    <div class="text">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/img-2.jpg" alt="">
                                                    </div>
                                                    <div class="text">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/img-2.jpg" alt="">
                                                    </div>
                                                    <div class="text">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection