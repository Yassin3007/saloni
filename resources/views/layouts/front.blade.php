<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        name="description"
        content="احجز موعدك مع صالونك دون الحاجة الي التنقل من مكانك"
    />
    <meta name="keywords" content="saloni.ma" />
    <title>Saloni.ma</title>
    <link rel="shortcut icon" href="{{asset('assets/images/ICONE 1.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset(getLink())}}" />
    <link rel="stylesheet" href="{{asset('assets/css/sign-in.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/dropzone.css')}}" />
</head>
<body class={{getLang()}}>
<!-- Start navbar -->
<nav>
    <div class="container">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo" /></a>
        </div>
        <ul>


            <li>
                <span>{{__('lang.اختر اللغة')}}</span>
                <div class="drop-down">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>

                @endforeach
                </div>
            </li>
            <li><a href="{{route('home')}}">{{__('lang.الرئيسية')}}</a></li>
            @auth()
                <li><a href="{{route('profile')}}">{{__('lang.الصفحة الشخصية')}}</a></li>
            @endauth


            @guest()
            <li><a href="{{route('userAuth',25458)}}">{{__('lang.تسجيل الدخول')}}</a></li>
            @endguest
            @auth()
                <li><a href="{{route('userLogout')}}">{{__('lang.تسجيل الخروج')}}</a></li>

            @endauth


        </ul>
    </div>
</nav>
<!-- End navbar -->

@yield('content')



<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>


<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/swiper.js')}}"></script>
<script src="{{asset('assets/js/rate.js')}}"></script>
<script src="{{asset('assets/js/accordion.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
<script src="{{asset('assets/js/slider.js')}}"></script>





<script src="{{asset('assets/js/dropzone.min.js')}}"></script>
@yield('script')
</body>
</html>
