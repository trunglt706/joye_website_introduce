@extends('guest.layout')
@section('title', 'Liên hệ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <div class="container position-relative" style="z-index: 5; padding-top: 100px;">
        <div class="box-contact-page mt-1">
            <div class="block-contact-information">
                <div class="block-images">
                    <img loading="lazy" src="{{ asset('style/images/bg1.jpg') }}" alt="image" class="img-fluid">
                </div>
                <div class="block-article">
                    <div class="-title text-center">
                        JOYE CORPORATION
                        <p class="text-white">
                            Tầng 26, Sunshine Palace, Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                    </div>
                    <div class="-content">
                        <div class="row">
                            <div class="col-6">
                                <p><i class="fas fa-phone"></i> 0948-410-214</p>
                            </div>
                            <div class="col-6">
                                <p><i class="fas fa-envelope"></i> info@joye.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-contact-map">
                @include('guest.general.error')
                <form action="{{ route('contact.create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name" class="form-label">Họ tên *</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ tên *" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="phone" class="form-label">Số điện thoại *</label>
                                <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="form-label">Nội dung *</label>
                        <textarea class="form-control" id="comment" name="comment" rows="8" placeholder="Gửi nội dung" required></textarea>
                    </div>
                    <button type="submit">Gửi liên hệ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
