<!--start footer-->
<footer id="footer" class="default">
    <div class="container">
        <div class="footer-btm mt-0 row">
            <div class="col-lg-6">
                <div class="copyright-text">
                    <p class="m-0">&copy; 2024 Joye | All right reserved.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-social text-end">
                    <ul>
                        @foreach ($socials as $item)
                            <li>
                                <a href="{{ $item->link ?? '#' }}">
                                    <img src="{{ $item->image }}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->
