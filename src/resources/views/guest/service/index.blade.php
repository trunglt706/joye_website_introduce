@extends('guest.layout2')
@section('title', 'Dịch vụ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>Dịch vụ</h2>
                    <ul>
                        <li><a href="#"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li>Dịch vụ</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <div class="container">
                <div class="row">
                    @foreach ($list as $item)
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('service.detail', ['slug' => $item->slug]) }}">
                                <div class="chanl-single">
                                    <img src="{{ $item->image }}" class="img-fluid" alt="">
                                    <div class="chanl-cont">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
