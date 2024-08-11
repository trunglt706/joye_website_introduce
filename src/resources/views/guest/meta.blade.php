<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
<meta name="description" content="@yield('description')">
<meta name="keyword" content="@yield('keyword')">
<meta name="author" content="">
<meta property="og:image" content="{{asset('style/web/images/og_thumb_1.png')}}"/>
<meta property="og:image:alt" content="@yield('title')"/>
<meta property='og:type' content='website'/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:title" content="@yield('title')"/>
<meta property="og:description" content="@yield('description')">