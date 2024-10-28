@extends('guest2.layout')
@section('title', $data->name)
@section('keywords', '')
@section('description', $data->description)
@section('image', get_url($data->image))
@section('content')
    <main class="bg-grey service">
        <div class="bl-breadcrumb">
            <div class="container">
                <div class="outer">
                    <a href="{{ route('v2.home') }}">Trang chủ</a><label>/</label>
                    <a href="{{ route('v2.service') }}">Dịch vụ</a><label>/</label>
                    <span>{{ $data->name }}</span>
                </div>
            </div>
        </div>
        <div class="bl-service-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner">
                            <img src="{{ get_url($data->image) }}" alt="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="bl-call-to-action">
                            <div class="title-head">
                                {{ $data->name }}
                            </div>
                            <div class="description">
                                {!! $data->price !!}
                            </div>
                            <div class="button-register">
                                <a href="#"><button class="btn">Đăng ký tư vấn</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="main-contain">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Chi tiết dịch vụ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Dịch vụ đi kèm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Cam kết</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>
                                    {!! $data->content !!}
                                </div>
                                <div id="menu1" class="container tab-pane fade"><br>
                                    {!! $data->dinh_kem !!}
                                </div>
                                <div id="menu2" class="container tab-pane fade"><br>
                                    {!! $data->cam_ket !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                    </div>
                </div>
            </div>
        </div>
        <div class="relative-post">
            <div class="container">
                <div class="title-head">Có thể bạn quan tâm </div>
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
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
