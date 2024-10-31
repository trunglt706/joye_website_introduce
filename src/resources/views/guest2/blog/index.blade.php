@extends('guest2.layout')
@section('title', 'Tin tức về Joye')
@section('keywords', '')
@section('description', 'Các bài viết về Joye')
@section('image', asset('style2/images/logo.png'))
@section('content')
    <main class="bg-grey service">
        <div class="bl-banner-title">
            <div class="container">
                <div class="banner" style="background-image: url('/style2/images/banner-blog.jpg');">
                    <div class="bg-color">
                        <div class="title-head">Blog</div>
                        <div class="description">Chia sẻ kiến thức và cập nhật xu hướng của ngành dưới góc nhìn của chuyên
                            gia </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bl-list-post">
            <div class="container">
                <div class="bl-filter">
                    <div class="name">Bộ lọc: </div>
                    <div class="item"><a href="{{ route('v2.blog') }}"
                            class="{{ !isset($_GET['g']) || !$_GET['g'] ? 'active' : '' }}">Tất cả</a></div>
                    <div class="item"><a href="{{ route('v2.blog') }}?g=Tin tức"
                            class="{{ isset($_GET['g']) && $_GET['g'] == 'Tin tức' ? 'active' : '' }}">Tin tức</a></div>
                    <div class="item"><a href="{{ route('v2.blog') }}?g=Giải trí"
                            class="{{ isset($_GET['g']) && $_GET['g'] == 'Giải trí' ? 'active' : '' }}">Giải trí</a></div>
                    @foreach (get_service_groups() as $item)
                        <div class="item">
                            <a class="{{ isset($_GET['g']) && $_GET['g'] == $item->name ? 'active' : '' }}"
                                href="{{ route('v2.blog') }}?g={{ $item->name }}">
                                {{ $item->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach ($list as $item)
                        <div class="col-lg-4">
                            <div class="bl-item-5">
                                <div class="name-project">{{ $item->group_name }}</div>
                                <div class="img">
                                    <a href="{{ route('v2.blog.detail', $item->slug) }}"><img
                                            src="{{ get_url($item->image) }}" alt="{{ $item->name }}"></a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="{{ route('v2.blog.detail', $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="description">
                                    {{ $item->description }}
                                </div>
                                <div class="view-more">
                                    <a href="{{ route('v2.blog.detail', $item->slug) }}">
                                        Xem chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bl-pagination">
                    {!! $list->appends(request()->all())->links() !!}
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
                            <div class="description">Liên hệ ngay với JoyE, để được ngay những thông tin về dịch vụ mà bạn
                                quan tâm nhé!</div>
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
