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
    <meta name="facebook-domain-verification" content="z3elim7j0goqngplnr34wgiq1a8n5r" />
    
    <title>@yield('title')</title>

    <link rel="canonical" href="@yield('url')">

    <link rel="shortcut icon" href="{{ asset('css/images/favicons.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/adaptiv.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/style_new.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/post-5.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/astra-addon.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/astra-addon-css-inline-css.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/formstyler.css') }}" type="text/css" media="all">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/formstyler.js') }}" defer></script>
    <script src="{{ asset('js/inputmask.js')}}" defer></script>
    <script src="{{ asset('js/my.js') }}" defer></script>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128952399-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-128952399-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
       new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
       j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
       'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
       })(window,document,'script','dataLayer','GTM-5896F9T');
   </script>
      <!-- End Google Tag Manager -->

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1896263670631147');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1896263670631147&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

</head>