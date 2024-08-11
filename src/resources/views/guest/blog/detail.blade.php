@extends('guest.layout2')
@section('title','Chi tiết bài viết')
@section('keywords','')
@section('description','')
@section('image', '')
@section('content')
     <!--start page content-->
     <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Single Blog</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                        <li><small>></small></li>
                        <li>Single Blog</li>
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
                                <a href="#"><img src="/style/images/blog-2.jpg" class="img-fluid" alt=""></a>
                            </div>
                            <div class="post-cont">
                                <h3><a href="#">Turn Your Apps Into Money Machines - Top 5 Ideas For a Best Selling App</a></h3>
                                <h6><a href="#"><i class="fa fa-user"></i> Admin</a><span class="maydate"><i class="fa fa-calendar-alt"></i> 14 May 2023</span></h6>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.</p>
                            </div>
                        </div>
                        <!--end blog single-->
                        <!--start post comment wrap-->
                        <div class="post-comment-wrap">
                            <h3>Comments (3)</h3>
                            <!--start comment single-->
                            <div class="comment-single">
                                <div class="avatar">
                                    <img src="/style/images/img-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="comnt-text">
                                    <div class="reply-icon">
                                        <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                    </div>
                                    <div class="comnt-info">
                                        <h5>Angel Smith</h5>
                                        <p>November 20, 2018 at 8:31 pm</p>
                                    </div>
                                    <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae feugiat fermentum.</p>
                                </div>
                            </div>
                            <!--end comment single-->
                            <!--start comment single-->
                            <div class="comment-single reply">
                                <div class="avatar">
                                    <img src="/style/images/img-2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="comnt-text">
                                    <div class="reply-icon">
                                        <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                    </div>
                                    <div class="comnt-info">
                                        <h5>Stanley Mills</h5>
                                        <p>November 20, 2018 at 8:31 pm</p>
                                    </div>
                                    <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae.</p>
                                </div>
                            </div>
                            <!--end comment single-->
                            <!--start comment single-->
                            <div class="comment-single">
                                <div class="avatar">
                                    <img src="/style/images/img-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="comnt-text">
                                    <div class="reply-icon">
                                        <a href="#">Reply <i class="icofont-reply-all"></i></a>
                                    </div>
                                    <div class="comnt-info">
                                        <h5>Seth Palmer</h5>
                                        <p>November 20, 2018 at 8:31 pm</p>
                                    </div>
                                    <p>Maecenas at turpis ut lacus posuere dapibus. Fusce et sollicitudin libero, id vehicula sem. Morbi pharetra nisl eget neque commodo facilisis. Nunc malesuada dolor vitae feugiat fermentum.</p>
                                </div>
                            </div>
                            <!--end comment single-->
                            <!--start comment form-->
                            <div class="comment-form">
                                <h3>FeedBack</h3>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email Address *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="submit">SUBMIT</button>
                                </form>
                            </div>
                            <!--end comment form-->
                        </div>
                        <!--end post comment wrap-->
                    </div>
                    <!--start blog sidebar-->
                    <div class="col-md-4">
                        <div class="blog-sidebar">
                            <!--start widget single-->
                            <div class="sidebar-widget">
                                <h4>Search</h4>
                                <form action="#" method="post">
                                    <div class="widget-serch form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="newsletter-btn text-center">

                                    </div>
                                </form>
                            </div>
                            <!--end widget single-->
                            <!--start widget single-->
                            <div class="sidebar-widget">
                                <h4>Categories</h4>
                                <ul>
                                    <li><a href="#">World Cup<span class="float-right">(16)</span></a></li>
                                    <li><a href="#">New Event<span class="float-right">(20)</span></a></li>
                                    <li><a href="#">Football<span class="float-right">(45)</span></a></li>
                                    <li><a href="#">Match<span class="float-right">(30)</span></a></li>
                                    <li><a href="#">Upcming Match<span class="float-right">(35)</span></a></li>
                                </ul>
                            </div>
                            <!--end widget single-->
                            <!--start widget single-->
                            <div class="sidebar-widget">
                                <h4>Archives</h4>
                                <ul>
                                    <li><a href="#">January<span class="float-right">(25)</span></a></li>
                                    <li><a href="#">February<span class="float-right">(40)</span></a></li>
                                    <li><a href="#">March<span class="float-right">(50)</span></a></li>
                                    <li><a href="#">April<span class="float-right">(70)</span></a></li>
                                    <li><a href="#">May<span class="float-right">(45)</span></a></li>
                                    <li><a href="#">June<span class="float-right">(15)</span></a></li>
                                </ul>
                            </div>
                            <!--end widget single-->
                            <!--start widget single-->
                            <div class="sidebar-widget tags">
                                <h4>Tags</h4>
                                <ul>
                                    <li><a href="#">event</a></li>
                                    <li><a href="#">match</a></li>
                                    <li><a href="#">world cup</a></li>
                                    <li><a href="#">football</a></li>
                                    <li><a href="#">upcoming</a></li>
                                </ul>
                            </div>
                            <!--end widget single-->
                        </div>
                    </div>
                    <!--end blog sidebar-->
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection