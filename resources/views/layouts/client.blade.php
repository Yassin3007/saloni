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
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
      <link rel="stylesheet" href="{{asset(getLink())}}" />
  </head>
  <body class={{getLang()}}>


    <!-- Start navbar -->
    <nav>
      <div class="container dashboard">
        <div class="logo">
          <a href="{{route('home')}}"><img src="{{{asset('assets/images/logo.png')}}}" alt="logo" /></a>
        </div>
        <div>
          <span></span>
          <a href="{{route('userLogout')}}" class="log-out">{{__('lang.Log Out')}}</a>
{{--          <div class="alerts">--}}
{{--            <i class="fa-solid fa-bell"></i>--}}
{{--            <ul>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
      </div>
    </nav>
    <!-- End navbar -->

    <main>
      <!-- start sidebar -->
      <aside>
        <img src="{{auth()->user()->photo}}" class={{level(auth()->user()->sallon->level)}} alt="img" />
        <ul>
          <li class={{highlight("index")}}>
            <a href="{{route('clientIndex')}}">
              <i class="fa-solid fa-house"></i>
              <span>{{__('lang.Dashboard')}}</span>
            </a>
          </li>
          <li class={{highlight("reservation")}}>

            <a href="{{route('clientReservations')}}">
              <i class="fa-regular fa-calendar-days"></i>
                <span>{{__('lang.Reservations')}}
                <div class="count">{{App\Models\Reservation::where('status',0)->where('sallon_id',auth()->user()->sallon->id)->count()}}</div>
                </span>

            </a>

          </li>



            <li class={{highlight("services")}}>
                <a href="{{route('clientServices')}}">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>{{__('lang.services')}}</span>
                </a>
            </li>
          <li class={{highlight("clientUsers")}}>
            <a href="{{route('clientUsers')}}">
              <i class="fa-solid fa-users"></i>
              <span>{{__('lang.clients')}}</span>
            </a>
          </li >
          <li class={{highlight("copouns")}}>
            <a href="{{route('clientCopouns')}}">
              <i class="fa-solid fa-gift"></i>
              <span>{{__('lang.Copouns')}}</span>
            </a>
          </li>
          <li class={{highlight("clientGuide")}}>
            <a href="{{route('clientGuide')}}">
              <i class="fa-solid fa-clapperboard"></i>
              <span>{{__('lang.Guides')}}</span>
            </a>
          </li>
          <li class={{highlight("setting")}}>
            <a href="{{route('clientSetting',auth()->user()->id)}}">
              <i class="fa-solid fa-gears"></i>
              <span>{{__('lang.Settings')}}</span>
            </a>
          </li>
        </ul>
{{--        <div class="support">--}}
{{--          <a href="#">--}}
{{--            <i class="fa-solid fa-user"></i>--}}
{{--            <span>Support</span>--}}
{{--          </a>--}}
{{--        </div>--}}
      </aside>
      <!-- end sidebar -->

      @yield('content')
    </main>

    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/personal_image.js')}}"></script>
    <script src="{{asset('assets/js/add_copon.js')}}"></script>
    <script src="{{asset('assets/js/accordion.js')}}"></script>
    <script src="{{asset('assets/js/alert.js')}}"></script>





  </body>
</html>
