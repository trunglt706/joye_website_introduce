@extends('guest.layout2')
@section('title', $service->name)
@section('keywords', '')
@section('description', $service->description)
@section('image', $service->image)
@section('content')
    <style>
        .page-breadcrumb {
            padding: 0px 0 80px !important;
        }


        @media(max-width: 736px) {
            .service-price {
                z-index: 0 !important;
            }
        }
    </style>
    <!--start page content-->
    <section id="page-cont">
        <div class="page-breadcrumb">
        </div>
        <div class="pt-3" style="padding-top: -100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mb-2">
                        <img src="{{ asset($service->image) }}" alt="Image" class="img-fluid w-100 mb-2">
                        <!--start blog single-->
                        <div class="blog-single">
                            <div class="post-cont">
                                <div class="mt-3">
                                    {!! $service->content !!}
                                </div>
                            </div>
                        </div>
                        <!--end blog single-->
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="service-price">
                            <div class="title">
                                {{ $service->name }}
                            </div>
                            <div class="start">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fa fa-star me-1" aria-hidden="true"></i>
                                @endfor
                            </div>
                            <div class="price text-danger">
                                {{ $service->price ?? 'Đang cập nhật' }}
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-danger w-100">Mua ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end page content-->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var element = $('.service-price');
            var offset = element.offset().top; // Get the original top offset of the element
            var container = $('.col-md-3');

            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();

                // Check if the scroll position has passed the top offset of the element
                if (scrollTop > offset) {
                    // Fix the element within the container's boundaries
                    element.css({
                        'position': 'fixed',
                        'top': '110px',
                        // 'right': container.offset().left + 'px', // Align right with col-md-3
                        'width': container.width() + 'px' // Maintain same width as col-md-3
                    });
                } else {
                    // Return element to its original position when scrolled back up
                    element.css({
                        'position': 'relative',
                        'top': '0px',
                        'width': '100%'
                    });
                }
            });
        });
    </script>
@endpush
