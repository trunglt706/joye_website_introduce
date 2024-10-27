@extends('guest.layout2')
@section('title', 'Giới thiệu')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <style>
        .post-cont p {
            font-size: 16px;
            line-height: 24px;
        }

        .about-testimonial .description {
            font-size: 18px;
            line-height: 30px;
            height: auto;
        }

        @media only screen and (max-width: 991px) {
            .about-testimonial {
                margin-top: -25px;
            }

            .about-testimonial .description {
                margin-top: 30px;
                text-align: center;
            }

            .about-testimonial .description {
                font-size: 16px !important;
            }

            .about-feature .title {
                font-size: 26px !important;
            }

            .post-cont h3 a {
                font-size: 32px !important;
            }
        }
    </style>
    <!--start page content-->
    <section>
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Giới thiệu</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                        <li><small>></small></li>
                        <li class="active">Giới thiệu</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-cont">
                                        <h3><a href="#" style="font-size: 40px;">“Welcome to JoyE”</a></h3>
                                        <div class="text-justify">
                                            <p>JoyE là một tổ chức dành giúp những Nhà sáng tạo nội dung
                                                và các Doanh nghiệp,
                                                Nhãn hàng có thể giới thiệu và cung
                                                cấp sản phẩm, dịch vụ của mình tới khách hàng mục tiêu
                                                thông qua nền tảng đa phương tiện.<br /><br />
                                                Sứ mệnh của chúng tôi là làm cho trải nghiệm của người mua
                                                với thương mại điện tử trở nên sáng tạo hơn, vui vẻ hơn. Qua
                                                đó, giúp các Nhà sáng tạo nội dung,
                                                Nhà bán hàng và các Doanh nghiệp, thương hiệu phát triển và thành công
                                                với những gì họ làm.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-cont">
                                        <div class="about-testimonial">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="img">
                                                        <img src="/style/images/about-ceo.png" alt="Image">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="description text-justify">
                                                        &ldquo;
                                                        Chúng tôi cung cấp các giải pháp tốt nhất về Thương mại điện tử và
                                                        LiveStreamming đến người dùng đã tin và sử dụng dịch vụ của Joye
                                                        &rdquo;
                                                    </div>
                                                    <div class="name">Nguyễn Thế Vi</div>
                                                    <div class="mini-text">(CEO JOYE)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="about-feature">
                                    <div class="title mt-5 text-uppercase">Tại sao chọn chúng tôi?</div>
                                    <div class="description text-justify">
                                        JoyE phát triển mạnh mẽ nhờ vào tư
                                        duy cởi mở, luôn thử nghiệm và điều
                                        chỉnh ý tưởng mới một cách nhanh
                                        chóng và tích cực. Chúng tôi mang
                                        đến các cơ hội đặc biệt để phát triển
                                        nhanh hơn và dẫn đầu xu hướng
                                        kinh doanh.
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/businessman.png" alt="Image">
                                                    </div>
                                                    <div class="text text-justify">
                                                        <strong>Chuyên gia</strong><br />
                                                        Chúng tôi sở hữu những
                                                        chuyên gia với năng lực
                                                        đặc biệt nhất trong lĩnh
                                                        vực của mình

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/like.png" alt="Image">
                                                    </div>
                                                    <div class="text text-justify">
                                                        <strong>Kinh nghiệm</strong><br />
                                                        Chúng tôi đã có những
                                                        trải nghiệm với rất nhiều
                                                        các chiến dịch bán hàng
                                                        cùng các thương hiệu
                                                        trong và ngoài nước
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="/style/images/trustworthy.png" alt="Image">
                                                    </div>
                                                    <div class="text text-justify">
                                                        <strong>Tiến hóa</strong><br />
                                                        Chúng tôi luôn cập nhật
                                                        công nghệ mới và ứng
                                                        dụng cho đối tác của
                                                        mình với mức độ tiến hóa
                                                        cao nhất
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
