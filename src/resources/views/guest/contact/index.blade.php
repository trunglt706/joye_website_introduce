@extends('guest.layout')
@section('title', 'Liên hệ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <div class="container position-relative" style="z-index: 5; padding-top: 150px;">
        <div class="row">
            <!--start contact form-->
            <div class="col-lg-6 col-md-7">
                <div class="contact-form">
                    <div class="contact-title">
                        <h4>Đừng ngần ngại liên hệ với chúng tôi</h4>
                        <h5>Chúng tôi sẽ phản hồi trong vòng 24 giờ</h5>
                    </div>
                    @include('guest.general.error')
                    <form action="{{ route('contact.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nhập họ tên *" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="10" placeholder="Gửi nội dung" required></textarea>
                        </div>
                        <button type="submit">Gửi liên hệ</button>
                    </form>
                </div>
            </div>
            <!--end contact form-->
            <div class="col-md-5 offset-lg-1">
                <div class="contact-cont">
                    <h2>Liên hệ với chúng tôi</h2>
                    <p>
                        Bạn rất quan trọng đối với chúng tôi và chúng tôi luôn nỗ lực cải thiện dịch vụ để phục vụ
                        bạn tốt hơn
                    </p>
                    <div class="contact-thumb">
                        <img src="/style/images/contact.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
