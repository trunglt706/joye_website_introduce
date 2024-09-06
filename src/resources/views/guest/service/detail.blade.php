@extends('guest.layout2')
@section('title', $data['service']->name)
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
            <div class="container">
                <div class="breadcrumb-cont text-center">
                    <h2>{{ $data['service']->name }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="icofont-home"></i> Trang chủ</a></li>
                        <li><small>></small></li>
                        <li>Dịch vụ</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mb-2">
                        <!--start blog single-->
                        <div class="blog-single">
                            {{-- <div class="post-media">
                                <img src="/style/images/blog-2.jpg" class="img-fluid" alt="{{ $data['service']->name }}">
                            </div> --}}
                            <div class="post-cont">
                                <h3>
                                    {{ $data['service']->name }}
                                </h3>
                                <div class="mt-3">
                                    {!! $data['service']->content !!}
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <i class="fa fa-user"></i> Admin
                                        <span class="maydate ms-3"><i class="fa fa-calendar-alt"></i>
                                            {{ date('d/m/Y', strtotime($data['service']->created_at)) }}</span>
                                    </h6>
                                    <div class="footer-social text-end">
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                    </div>
                    <div class="col-md-3 mb-2">
                        @foreach ($data['other'] as $item)
                            <a href="{{ route('service.detail', ['slug' => $item->slug]) }}">
                                <div class="chanl-single">
                                    <img src="{{ $item->image }}" class="img-fluid" alt="">
                                    <div class="chanl-cont">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
