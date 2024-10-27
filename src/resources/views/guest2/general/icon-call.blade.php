<div id="button-contact-vr">
    <div id="gom-all-in-one">
        @foreach ($socials as $item)
            <div class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="{{ $item->link }}">
                            <img src="{{ $item->image }}">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="scroll-to-top">
    <a href="#" onclick="window.scrollTo({top: 0});return false">
        <i class="icofont-ui-play"></i>
    </a>
</div>
