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
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css?v2') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mmd.css?v4') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr.custom.79639.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.ba-cond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mmd.js?v3') }}"></script>
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
                                    <source
                                        srcset="{{ asset('assets/images/flags/' . app()->getLocale() . '.webp' ) }}">
                                    <img src="{{ asset('assets/images/flags/' . app()->getLocale() . '.jpg' ) }}"
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
                                                        srcset="{{ asset('assets/images/flags/' . $lang . '.webp' ) }}">
                                                    <img src="{{ asset('assets/images/flags/' . $lang . '.jpg' ) }}"
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
                                                srcset="{{ asset('assets/images/flags/' . app()->getLocale() . '.webp' ) }}">
                                            <img
                                                src="{{ asset('assets/images/flags/' . app()->getLocale() . '.jpg' ) }}"
                                                class="flagIcon" loading="lazy">
                                        </picture>
                                        {{ array_search(app()->getLocale(),config('app.available_locales')) }}
                                    </a>
                                    <ul class="dropdown-content">
                                        @foreach(config('app.available_locales') as $langKey => $lang)
                                            @if(app()->getLocale() != $lang)
                                                <li>
                                                    <a href="{{ route('main',['locale' => $lang ]) }}"
                                                       class="selectLangauge">
                                                        <picture>
                                                            <source
                                                                srcset="{{ asset('assets/images/flags/' . $lang . '.webp' ) }}">
                                                            <img
                                                                src="{{ asset('assets/images/flags/' . $lang . '.jpg' ) }}"
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
<link href="{{ asset('assets/css/GlobeStyle.css') }}" rel="stylesheet">


<script type="text/javascript">

    window.onload = function () {
        $.getScript("/assets/js/dogsOnMap.js", function () {
            $.getScript("/assets/js/miniature.earth.js", function () {})
        });
    }
    window.addEventListener( "earthjsload", function() {

        myearth = new Earth( 'myearth', {location: { lat: 35, lng: 80 },light: 'none',mapLandColor : '#fff',mapSeaColor : '#66d8ff',mapBorderColor : '#66d8ff',mapBorderWidth : 0.04,autoRotate: true,autoRotateSpeed: 1.1,autoRotateDelay: 2000,} );

        myearth.addEventListener( "ready", function() {for ( var i=0; i < dogs.length; i++ ) {var marker = this.addMarker( {mesh : ["Pin","Needle"],color: '#00a8ff',color2: '#9f9f9f',offset: -0.2,location : { lat: dogs[i][2], lng: dogs[i][3] },scale: 0.01,visible: false,hotspot: true,hotspotRadius : 0.4,hotspotHeight : 1.5,index: i,dogName : dogs[i][0],dogPlace : dogs[i][1]['{{ app()->getLocale() }}'],dogPhoto : dogs[i][4]} );
            marker.addEventListener('mouseover', function() {if (this.color !== '#ffff00') {document.getElementById('tip-layer').style.opacity = 1;document.getElementById('globeDogPhoto').src = "assets/images/pics/"+this.dogPhoto;document.getElementById('tip-big').innerHTML = this.dogName;document.getElementById('tip-small').innerHTML = this.dogPlace.split(',').join('<br>');this.color = 'red';}});
            marker.addEventListener('mouseout', function() {if (this.color !== '#ffff00') {document.getElementById('tip-layer').style.opacity = 0;this.color = '#00a8ff';}});
            marker.addEventListener('click', function() {for (i=0;i<markers.length;i++) {markers[i].color = '#00a8ff';if (markers[i].dogName==this.dogName) {document.getElementById('tip-layer').style.opacity = 1;document.getElementById('globeDogPhoto').src = "assets/images/pics/"+this.dogPhoto;document.getElementById('tip-big').innerHTML = this.dogName;document.getElementById('tip-small').innerHTML = this.dogPlace.split(',').join('<br>');markers[i].color = 'yellow';}}selectStartMarker( this );});
            markers.push( marker );
        }restorePins();} );
    } );

</script>
<footer>
    <div id="copyright">MymonkeyDog &copy; {{ date(('Y')) }} </div>
</footer>
</body>
</html>
