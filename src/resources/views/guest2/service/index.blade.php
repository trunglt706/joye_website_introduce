@extends('guest2.layout')
@section('title', 'Dịch vụ')
@section('keywords', '')
@section('description', 'Dịch vụ')
@section('image', '')
@section('content')
    <main class="bg-grey service">
        <div class="bl-banner-title">
            <div class="container">
                <div class="banner" style="background-image: url('/style2/images//banner-title.jpg');">
                    <div class="bg-color">
                        <div class="title-head">Dịch vụ</div>
                        <div class="description">Lựa chọn dịch vụ phù hợp với bạn</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bl-list-post">
            <div class="container">
                <div class="bl-filter">
                    <div class="name">Bộ lọc: </div>
                    <div class="item"><a href="#" class="active">Tất cả</a></div>
                    @foreach ($groups as $item)
                        <div class="item">
                            <a href="{{ route('v2.service') }}?g={{ $item->slug }}">
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
                                    <a href="{{ route('v2.service.detail', $item->slug) }}"><img
                                            src="{{ get_url($item->image) }}" alt="{{ $item->name }}"></a>
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="{{ route('v2.service.detail', $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="description">
                                    {{ $item->description }}
                                </div>
                                <div class="view-more">
                                    <a href="{{ route('v2.service.detail', $item->slug) }}">
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
                            <div class="bl-form-contact">
                                <div class="title-head">
                                    <h3>Đăng ký tư vấn miễn phí!</h3>
                                </div>
                                <form action="">
                                    <div class="form-detail">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Họ và tên của bạn">
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Email hoặc số điện thoại">
                                        </div>
                                        <div class="input-group">
                                            <select name="" id="" class="form-control">
                                                <option value="" class="first">
                                                    Chọn dịch vụ mà bạn quan tâm
                                                </option>
                                                @foreach ($groups as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <textarea name="" id="" class="form-control" rows="4" placeholder="Yêu cầu cụ thể (nếu có)"></textarea>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="btn-submit">
                                        <button type="submit" class="btn">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
