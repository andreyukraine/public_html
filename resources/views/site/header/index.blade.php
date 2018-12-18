<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website">
    <meta property="og:url" content="chicopee.in.ua">
    <meta property="og:site_name" content="chicopee.in.ua">
    <meta property="og:image" content="{{asset('images/logo_w.svg')}}">
    <meta property="og:title" content="@yield('meta')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="canonical" href="@yield('url')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Bootstrap JavaScript -->
    <link rel="shortcut icon" href="/public/favicons.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/adaptiv.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/style_new.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/post-5.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/astra-addon.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/astra-addon-css-inline-css.css') }}" type="text/css" media="all">
    <link href="{{ asset('css/formstyler.css') }}" rel="stylesheet">


    <script src="{{ asset('js/jquery-3.2.1.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/formstyler.js') }}" defer></script>
    <script src="{{asset('js/inputmask.js')}}" defer></script>
    <script src="{{ asset('js/my.js') }}" defer></script>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128952399-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-128952399-1');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1984210568310332');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1984210568310332&ev=PageView}
        &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>