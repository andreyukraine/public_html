<header itemtype="https://schema.org/WPHeader" itemscope="itemscope" id="masthead" class="site-header header-main-layout-1 ast-primary-menu-enabled ast-hide-custom-menu-mobile ast-menu-toggle-icon ast-mobile-header-inline" role="banner">
    <div id="top_menu" class="main-header-bar-wrap">
        <div class="main-header-bar">
            <div class="ast-container">
                <div class="ast-flex main-header-container">
                    <div class="site-branding">
                        <div class="ast-site-identity" itemscope="itemscope" itemtype="https://schema.org/Organization">
                           <span class="site-logo-img"><a href="/" class="custom-logo-link" rel="home" itemprop="url">
                           <img src="{{asset('/images/logo_w.svg')}}" class="custom-logo" alt="Logo Regular 01" itemprop="logo" width="189" height="85"></a></span>
                        </div>
                    </div>
                    <div class="tel_header">
                        <span>+38 067 6 907 177</span>
                        <span>+38 050 1 907 177</span>
                    </div>

                    <!-- .site-lang -->
                    <div class="lang_selector">
                        <span class="select_lang <?php if(App::getLocale() == "ua"){ echo ("active");}?>" id="ua">UA</span>/
                        <span class="select_lang <?php if(App::getLocale() == "ru"){ echo ("active");}?>" id="ru">RU</span>/
                        <span class="select_lang <?php if(App::getLocale() == "en"){ echo ("active");}?>" id="en">EN</span>
                    </div>

                    <!-- autorizate -->
                    {{--<a href="{{ route('goblin') }}" class="sticky-custom-logo">--}}
                        {{--<img src="{{ asset('/images/login.png') }}" class="img-fluid center" alt="">--}}
                    {{--</a>--}}
                    <!-- .site-branding -->
                    <div class="social">
                        <a target="_blank" href="https://www.facebook.com/chicopee.ua" class="sticky-custom-logo" itemprop="url">
                            <img src="{{ asset('/images/fb.svg') }}" class="img-fluid center" alt="">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/chicopee.ua/" class="sticky-custom-logo" itemprop="url">
                            <img src="{{ asset('/images/insta.svg') }}" class="img-fluid center" alt="">
                        </a>
                    </div>
                    <div class="ast-main-header-bar-alignment">
                        <div class="main-header-bar-navigation">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <img src="{{asset('/images/menu.svg')}}">
                                </span>
                            </button>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-collapse justify-content-md-center collapse" id="containerNavbarCenter" aria-expanded="false" style="">
                            <ul class="navbar-nav">
                                <li class="nav-item active"><a class="nav-link" href="/catalog">{{ trans('menu.catalog')}}</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/pages/about">{{ trans('menu.about')}}</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/pages/shops">{{trans('menu.buy')}}</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/pages/contact">{{ trans('menu.contact')}}</a></li>
                            </ul>
                        </div>
                    </nav>

                    <!-- Main Header Container -->
                </div>
                <!-- ast-row -->
            </div>
            <!-- Main Header Bar -->
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
        </svg>
        <!-- Main Header Bar Wrap -->
</header>
<!-- #masthead -->
<div>

    <header id="ast-fixed-header" class="site-header">
        <div class="main-header-bar-wrap">
            <div class="main-header-bar">
                <div class="ast-container">
                    <div class="ast-flex main-header-container">
                        <div class="site-branding">
                            <div>
                                    <span class="site-logo-img">
                                        <a href="/" class="sticky-custom-logo" rel="home" itemprop="url">
                                            <img src="{{ asset('/images/logo.svg') }}" class="custom-logo" alt="" width="189" height="85">
                                        </a>
                                    </span>
                            </div>
                        </div>
                        <!-- .site-branding -->
                        <div class="ast-mobile-menu-buttons">
                            <div class="ast-button-wrap">
                                <button type="button" class="menu-toggle main-header-menu-toggle ast-mobile-menu-buttons-fill" rel="main-menu" aria-controls="primary-menu" aria-expanded="false" data-index="1">
                                    <span class="screen-reader-text">Main Menu</span>
                                    <span class="menu-toggle-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div class="ast-main-header-bar-alignment">
                            <div class="main-header-bar-navigation">
                                <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
                                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="navbar-collapse justify-content-md-center collapse" id="containerNavbarCenter" aria-expanded="false" style="">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active"><a class="nav-link" href="/catalog">{{ trans('menu.catalog')}}</a></li>
                                            <li class="nav-item active"><a class="nav-link" href="/pages/about">{{ trans('menu.about')}}</a></li>
                                            <li class="nav-item active"><a class="nav-link" href="/pages/shops">{{trans('menu.buy')}}</a></li>
                                            <li class="nav-item active"><a class="nav-link" href="/pages/contact">{{ trans('menu.contact')}}</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Main Header Container -->
                </div>
                <!-- ast-row -->
            </div>
            <!-- Main Header Bar -->
        </div>
        <!-- Main Header Bar Wrap -->
    </header>
</div>


