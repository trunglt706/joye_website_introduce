@extends('guest.layout2')
@section('title','FAQ')
@section('keywords','')
@section('description','')
@section('image', '')
@section('content')
    <!--start faq area-->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="breadcrumb-cont text-center">
                <h2>FAQ</h2>
                <ul>
                    <li><a href="#"><i class="icofont-home"></i> Home</a></li>
                    <li><small>></small></li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="faq-area" data-scroll-index="5">
        <div class="container">
            <div class="row">
                <!--start section heading-->
                <div class="col-md-8 offset-md-2">
                    <div class="sec-heading text-center">
                        <h4>Got any Questions?</h4>
                        <h2>We’ve got answers!</h2>
                        <h5>We're Here to Help. We value our relationship with you and strive to provide you with assistance and answers when you need it.</h5>
                    </div>
                </div>
                <!--end section heading-->
            </div>
            <div class="row">
                <!--start faq accordian-->
                <div class="col-lg-10 offset-lg-1">
                    <div id="accordion" role="tablist">
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header active" role="tab" id="faq1">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">Can I watch local sports in my area?</a>
                            </div>
                            <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="faq1" data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq2">
                                <a class="collapsed" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">Can I sign in to WatchESPN, Fox Sports Go or NBC Sports?</a>
                            </div>
                            <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="faq2" data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq3">
                                <a class="collapsed" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3">What is the video quality and how much bandwidth do I need?</a>
                            </div>
                            <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="faq3" data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq4">
                                <a class="collapsed" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">How can I stream sports on multiple devices at the same time?</a>
                            </div>
                            <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="faq4" data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                    </div>
                </div>
                <!--end faq accordian-->
            </div>
        </div>
    </section>
    <!--end faq area-->
@endsection