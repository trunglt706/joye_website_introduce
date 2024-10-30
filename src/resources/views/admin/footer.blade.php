<footer class="footer px-4">
    <div>
        Copyright © 2024 | <a href="{{ asset('hdsd.pdf') }}" class="text-decoration-none">HDSD</a>
    </div>
    <div class="ms-auto">
        <a href="{{ route('admin.clear_cache') }}" class="text-decoration-none">Clear cache</a> |
        {{ get_option('seo-name') }}
    </div>
</footer>
