@extends('guest2.layout')
@section('title', 'Joye')
@section('keywords', '')
@section('description', 'Giới thiệu về Joye')
@section('image', asset('style2/images/logo.png'))
@section('content')
    <main>
        <section class="bl-mv">
            <br><br>
            <div class="container">
                <div class="title-head">
                    <h2>Giải pháp Marketing toàn diện<br />cho doanh nghiệp</h2>
                </div>
                <div class="description">
                    <span>JoyE mang đến các cơ hội đặc biệt để phát triển nhanh hơn<br />và dẫn đầu xu hướng kinh
                        doanh.</span>
                </div>
                <div class="bl-button-link">
                    <a href="{{ route('v2.contact') }}"><button class="btn active">Liên hệ ngay</button></a>
                    <a href="{{ route('v2.about') }}"><button class="btn">Về chúng tôi</button></a>
                </div>
                <div class="video">
                    <iframe width="100%" height="652" src="https://www.youtube.com/embed/MseC9tOpn5g?autoplay=1&mute=1"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    {{-- <img src="/style2/images/video.webp" alt="Image">
                    <div class="bg"></div>
                    <div class="icon-play">
                        <a href="https://youtu.be/MseC9tOpn5g" target="_blank"><img src="/style2/images/Play-Button.png"
                                alt="Image"></a>
                    </div> --}}
                </div>
                <div class="partner">
                    <div class="text">Được tin tưởng hợp tác cùng các nhãn hàng & chương trình</div>
                    <div class="slide slide-1">
                        <div class="list only-pc-992">
                            @foreach ($partners as $item)
                                <div><img src="{{ get_url($item->image) }}" alt="{{ $item->name }}"></div>
                            @endforeach
                        </div>
                        <div class="list only-sp-991">
                            @foreach ($partners as $key => $item)
                                @php
                                    $order = 0;
                                    if ($key == 1 || $key == 3) {
                                        $order = 1;
                                    } else {
                                        $order = 2;
                                    }
                                @endphp
                                <div class="order-{{ $order }}"><img src="{{ get_url($item->image) }}"
                                        alt="{{ $item->name }}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bl-services">
            <div class="container">
                <h2 class="bl-title center">Dịch vụ của JoyE</h2>
                <div class="bl-description center">
                    JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp cùng đội ngũ chuyên gia giàu kinh nghiệm,
                    giúp doanh nghiệp tối ưu tiềm năng và bứt phá trong mọi lĩnh vực.
                </div>
                <div class="row">
                    @foreach ($service_groups as $item)
                        <div class="col-lg-6">
                            <div class="bl-item-1">
                                <div class="img">
                                    <a href="{{ route('v2.service') }}?q={{ $item->slug }}">
                                        <img src="{{ get_url($item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="{{ route('v2.service') }}?q={{ $item->slug }}">
                                            <img src="{{ get_url($item->icon) }}" alt="Image">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="description">
                                    {!! $item->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="bl-projects">
            <div class="container">
                <h2 class="bl-title">Dự án của JoyE</h2>
                <div class="bl-description">
                    Với kinh nghiệm triển khai nhiều dự án lớn, JoyE đã hợp tác với hơn 200 KOLs,
                    KOCs và các nền tảng hàng đầu, mang đến những giải pháp toàn diện cho các lĩnh vực
                </div>
            </div>
            <div class="container-only-left">
                @php
                    $count_project = count($projects) > 3;
                @endphp
                <div class="slide slide-2">
                    <div class="nav-button">
                        @if ($count_project)
                            <img class="click-prev" src="/style2/images/arrow-left.png" alt="Image">
                            <img class="click-next" src="/style2/images/arrow-right.png" alt="Image">
                        @endif
                    </div>
                    <div class="list">
                        @foreach ($projects as $item)
                            <div class="bl-item-2">
                                <div class="name-project">{{ $item->group_name }}</div>
                                <div class="img">
                                    <img src="{{ get_url($item->image) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="title">
                                    <h3><label>{{ $item->name }} - </label> {{ $item->description }}</h3>
                                </div>
                                <div class="p-index">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="item">
                                                <div class="percent">
                                                    <div>{{ $item->truy_cap }}</div> <img
                                                        src="/style2/images/Percentage Arrow.png" alt="Image">
                                                </div>
                                                <div class="text-des">
                                                    <div>Lượt truy cập</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="item">
                                                <div class="percent">{{ $item->doanh_thu }}</div>
                                                <div class="text-des">Doanh thu</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="bl-testimonial">
            <div class="container">
                <h2 class="bl-title center">Khách hàng nói gì về JoyE</h2>
                <div class="list-customer">
                    <div class="row">
                        @foreach ($feedbacks as $item)
                            <div class="col-md-4">
                                <div class="bl-item-3">
                                    <div class="description">
                                        {{ $item->description }}
                                    </div>
                                    <div class="author">
                                        <div class="thumb">
                                            <img src="{{ get_url($item->image) }}" alt="{{ $item->name }}">
                                        </div>
                                        <div class="name">
                                            <div class="fullname">{{ $item->name }}</div>
                                            <div class="text-des">{{ $item->position }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="bl-faq">
            <div class="container">
                <div class="accordion" id="accordionFAQ">
                    <h2 class="bl-title center">Câu hỏi thường gặp</h2>
                    @foreach ($fas as $item)
                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapse-{{ $item->id }}"
                                    aria-expanded="false">
                                    {{ $item->name }}
                                </a>
                            </div>
                            <div id="collapse-{{ $item->id }}" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="card-body">
                                    {!! $item->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="bl-contact">
            <div class="container">
                <div class="bg-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="title-head">
                                <h3>Đã có 200+ doanh nghiệp đối tác lựa chọn đồng hành cùng JoyE</h3>
                            </div>
                            <div class="description">Liên hệ ngay với JoyE, để được ngay những thông tin về dịch vụ mà
                                bạn quan tâm nhé!</div>
                            <div class="social">
                                <a href="#"><img src="/style2/images/zalo.png" alt="Image"></a>
                                <a href="#"><img src="/style2/images/messenger.png" alt="Image"></a>
                                <a href="#"><img src="/style2/images/facebook.png" alt="Image"></a>
                            </div>
                            <div class="info">
                                <div class="item"><i class="fa-solid fa-phone"></i>0903 414 993</div>
                                <div class="item"><i class="fas fa-envelope"></i>info@joye.vn</div>
                                <div class="item"><i class="fas fa-map-marker-alt"></i>Tầng 26, Sunshine Palace, Lĩnh
                                    Nam, Hoàng Mai, Hà Nội </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            @include('guest2.general.form-contact')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
