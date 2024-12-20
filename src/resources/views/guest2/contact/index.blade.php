@extends('guest2.layout')
@section('title', 'Liên hệ với Joye')
@section('keywords', '')
@section('description', 'Liên hệ với Joye')
@section('image', asset('style2/images/logo.png'))
@section('content')
    <main class="bg-grey service">
        <div class="bl-contact-title">
            <div class="container">
                <h2 class="bl-title center">Thông tin liên hệ</h2>
                <div class="bl-description center">
                    Muốn biết được thêm thông tin về dịch?<br />Đội ngũ của chúng tôi luôn sẵn sàng hỗ trợ bạn
                </div>
            </div>
        </div>
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
    </main>
@endsection
