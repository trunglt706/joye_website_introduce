@extends('guest2.layout')
@section('title', 'Về Joye')
@section('keywords', '')
@section('description', 'Giới thiệu về Joye')
@section('image', asset('style2/images/logo.png'))
@section('content')
    <main>
        <div class="bl-about-description">
            <div class="container">
                <h2 class="bl-title center">Welcome to JoyE</h2>
                <div class="banner">
                    <img src="/style2/images/banner.webp" alt="Image">
                </div>
                <div class="bl-description center">
                    {!! $data !!}
                </div>
            </div>
        </div>
        <div class="bl-person">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="thumb">
                            <img src="/style2/images/thumb-person.webp" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-7">
                        <div class="outer">
                            <div class="description">
                                Chúng tôi cung cấp các giải pháp tốt nhất về thương mại điện tử và
                                livestream đến người dùng đã tin và sử dụng dịch vụ của JoyE
                            </div>
                            <div class="name">
                                Nguyễn Thế Vi - CEO JoyE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bl-why-choose-us">
            <div class="container">
                <h2 class="bl-title center">Tại sao chọn chúng tôi?</h2>
                <div class="bl-description center">
                    JoyE phát triển mạnh mẽ nhờ vào tư duy cởi mở,
                    luôn thử nghiệm và điều chỉnh ý tưởng mới một cách nhanh chóng và tích cực.
                    Chúng tôi mang đến các cơ hội đặc biệt để phát triển nhanh hơn
                    và dẫn đầu xu hướng kinh doanh.
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bl-item-4">
                            <div class="icon"><img src="/style2/images/icon-1.png" alt="Image"></div>
                            <div class="title">Chuyên gia</div>
                            <div class="description">
                                Chúng tôi sở hữu những chuyên gia với năng đặc biệt nhất trong lĩnh vực của mình
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bl-item-4">
                            <div class="icon"><img src="/style2/images/icon-2.png" alt="Image"></div>
                            <div class="title">Kinh nghiệm</div>
                            <div class="description">
                                Chúng tôi đã có những trải nghiệm với rất nhiều các chiến dịch bán hàng cùng các thương hiệu
                                trong và ngoài nước
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bl-item-4">
                            <div class="icon"><img src="/style2/images/icon-3.png" alt="Image"></div>
                            <div class="title">Tiến hóa</div>
                            <div class="description">
                                Chúng tôi luôn cập nhật công nghệ mới và ứng dụng cho đối tác của mình với mức độ tiến hóa
                                cao nhất
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
