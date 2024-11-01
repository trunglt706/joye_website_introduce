@extends('guest.layout2')
@section('title', 'Câu hỏi thường gặp')
@section('keywords', 'FAQ')
@section('description', 'Câu hỏi thường gặp')
@section('image', asset('style2/images/logo.png'))
@section('content')
    <!--start faq area-->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2>FAQ</h2>
                <ul>
                    <li><a href="{{ route('v2.home') }}"><i class="icofont-home"></i> Trang chủ</a></li>
                    <li><small>></small></li>
                    <li class="active">Câu hỏi thường gặp</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="faq-area" data-scroll-index="5">
        <div class="container">
            <div class="row">
                <!--start faq accordian-->
                <div class="col-lg-10 offset-lg-1">
                    <div id="accordionFAQ" role="tablist">
                        @foreach ($data as $item)
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
                <!--end faq accordian-->
            </div>
        </div>
    </section>
    <!--end faq area-->
@endsection
