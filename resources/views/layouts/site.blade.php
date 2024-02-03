<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('TITLE') }}</title>
    <meta name="description" content="{{ __('DESCRIPTION') }}"/>
    <meta name="keywords" content="{{ __('KEYWORDS') }}"/>
    <link rel="alternate" hreflang="x-default" href="https://mymonkeydog.com/"/>
    <link rel="alternate" hreflang="ru" href="https://mymonkeydog.com/ru"/>
    <link rel="alternate" hreflang="en" href="https://mymonkeydog.com/en"/>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mmd.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mmd.js') }}"></script>
    <!--
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QQB9XWRSXC"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QQB9XWRSXC"></script>
	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-QQB9XWRSXC');</script>
	<script type="text/javascript">(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");ym(52353781, "init", {clickmap:true,trackLinks:true,accurateTrackBounce:true});</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/52353781" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    -->
</head>
<body>
<header>
    <div class="container">
        <div class="row-fluid">
            <div class="navigation">
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <a class="btn btn-navbar btnOverlay" data-toggle="collapse"
                           data-target=".nav-collapse">&#9776;</a>
                        <div id="flagsForMobile" class="dropdown">
                            <a class="dropbtn">
                                <picture>
                                    <source srcset="{{ asset('images/flags/' . app()->getLocale() . '.webp' ) }}">
                                    <img src="{{ asset('images/flags/' . app()->getLocale() . '.jpg' ) }}"
                                         class="flagIcon" loading="lazy">
                                </picture>
                            </a>
                            <ul class="dropdown-content">
                                @foreach(config('app.available_locales') as $langKey => $lang)
                                    @if(app()->getLocale() != $lang)
                                        <li>
                                            <a href="{{ route('main',['locale' => $lang ]) }}" class="selectLangauge">
                                                <picture>
                                                    <source
                                                        srcset="{{ asset('images/flags/' . $lang . '.webp' ) }}">
                                                    <img src="{{ asset('images/flags/' . $lang . '.jpg' ) }}"
                                                         class="flagIcon" loading="lazy">
                                                </picture>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="#" class="home">{{ __('HOME') }}</a></li>
                                <li><a href="#" class="services">{{ __('BREED_ABOUT') }}</a></li>
                                <li><a href="#" class="library">{{ __('LIBRARY') }}</a></li>
                                <li><a href="#" class="portfolio">{{ __('PHOTO') }}</a></li>
                                <li><a href="#" class="about">{{ __('ABOUT_KENNEL') }}</a></li>
                                <li><a href="#" class="puppies">{{ __('PUPPIES') }}</a></li>
                                <li><a href="#" class="team">{{ __('TEAM') }}</a></li>
                                <li><a href="#" class="news">{{ __('NEWS') }}</a></li>
                                <li class="dropdown">
                                    <a class="dropbtn">
                                        <picture>
                                            <source
                                                srcset="{{ asset('images/flags/' . app()->getLocale() . '.webp' ) }}">
                                            <img src="{{ asset('images/flags/' . app()->getLocale() . '.jpg' ) }}"
                                                 class="flagIcon" loading="lazy">
                                        </picture>
                                        {{ array_search(app()->getLocale(),config('app.available_locales')) }}
                                    </a>
                                    <ul class="dropdown-content">
                                        @foreach(config('app.available_locales') as $langKey => $lang)
                                            @if(app()->getLocale() != $lang)
                                                <li>
                                                    <a href="{{ route('main',['locale' => $lang ]) }}" class="selectLangauge">
                                                        <picture>
                                                            <source
                                                                srcset="{{ asset('images/flags/' . $lang . '.webp' ) }}">
                                                            <img src="{{ asset('images/flags/' . $lang . '.jpg' ) }}"
                                                                 class="flagIcon" loading="lazy">
                                                        </picture>
                                                        {{ $langKey }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('content')
<script type="text/javascript" src="{{ asset('assets/js/isotope.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.imagesloaded.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/flexslider.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}" defer></script>
<script>
    function showpic(current, next) {
        $('#' + current).hide();
        $('#' + next).fadeIn(1000)
    }
</script>
<footer>
    <div id="copyright">MymonkeyDog &copy; {{ date(('Y')) }} </div>
</footer>
</body>
</html>
