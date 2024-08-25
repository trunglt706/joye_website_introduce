@extends('guest.layout2')
@section('title', 'Câu hỏi thường gặp')
@section('keywords', 'FAQ')
@section('description', 'Câu hỏi thường gặp')
@section('image', '')
@section('content')
    <!--start faq area-->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2>FAQ</h2>
                <ul>
                    <li><a href="{{ route('home') }}"><i class="icofont-home"></i> Trang chủ</a></li>
                    <li><small>></small></li>
                    <li class="active">Câu hỏi thường gặp</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="faq-area" data-scroll-index="5">
        <div class="container">
            {{-- <div class="row">
                <!--start section heading-->
                <div class="col-md-8 offset-md-2">
                    <div class="sec-heading text-center">
                        <h2>We’ve got answers!</h2>
                        <h5>
                            Chúng tôi ở đây để hỗ trợ. Chúng tôi coi trọng mối quan hệ với bạn và nỗ lực cung cấp sự trợ
                            giúp cũng như câu trả lời khi bạn cần
                        </h5>
                    </div>
                </div>
                <!--end section heading-->
            </div> --}}
            <div class="row">
                <!--start faq accordian-->
                <div class="col-lg-10 offset-lg-1">
                    <div id="accordion" role="tablist">
                        @foreach ($data as $key => $item)
                            <div class="card">
                                <div class="card-header {{ $key == 0 ? 'active' : '' }}" role="tab"
                                    id="faq{{ $key }}">
                                    <a data-toggle="collapse" href="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapse{{ $key }}">
                                        {{ $item->name }}
                                    </a>
                                </div>
                                <div id="collapse{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}"
                                    role="tabpanel" aria-labelledby="faq{{ $key }}" data-parent="#accordion">
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
