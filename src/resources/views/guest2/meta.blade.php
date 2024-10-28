<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
<meta name="description" content="@yield('description')">
<meta name="keyword" content="@yield('keyword')">
<link rel="icon" type="image/png" sizes="16x16" href="{{ get_option('seo-favico') }}">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="copyright" content="joye" />
<meta name="author" content="joye" />
<meta name="robots" content="noarchive, max-image-preview:large, index" />
<meta name="googlebot" content="noarchive" />
<meta name="geo.placename" content="Viet Nam" />
<meta name="geo.region" content="VN" />
<meta content="vi-VN" itemprop="inLanguage" />

<!-- META FOR FACEBOOK -->
<meta property="og:image" content="@yield('image')" />
<meta property="og:image:alt" content="@yield('title')" />
<meta property='og:type' content='website' />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')">
<!-- END META FOR FACEBOOK -->

<!-- Twitter Card -->
<meta name="twitter:card" value="summary" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="@yield('image')" />
<meta name="twitter:site" content="{{ Request::url() }}" />
<meta name="twitter:creator" content="Joye" />
<!-- End Twitter Card -->
