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
          <a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="logo" /></a>
        </div>
        <div>
          <span></span>
          <a href="{{route('adminLogout')}}" class="log-out">{{__('lang.Log Out')}}</a>
{{--          <div class="alerts">--}}
{{--            <i class="fa-solid fa-bell"></i>--}}
{{--            <ul>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--              <li>item</li>--}}
{{--            </ul>--}}
{{--          </div>--}}
        </div>
      </div>
    </nav>
    <!-- End navbar -->

    <main>
      <!-- start sidebar -->
      <aside>
        <img src="{{auth()->user()->photo}}" alt="img" />
        <ul>
          <li class={{adminHighlight('index')}}>
            <a href="{{route('adminIndex')}}">
              <i class="fa-solid fa-house"></i>
              <span>{{__('lang.Dashboard')}}</span>
            </a>
          </li>
          <li class={{adminHighlight('reservation')}}>
            <a href="{{route('adminReservations')}}">
              <i class="fa-regular fa-calendar-days"></i>
              <span>{{__('lang.Reservations')}}</span>
            </a>
          </li>
          <li class={{adminHighlight('ActiveSallons')}}>
            <a href="{{route('adminActiveSallons')}}">
              <i class="fa-solid fa-screwdriver-wrench"></i>
              <span>{{__('lang.Sallons')}}</span>
            </a>
          </li>

            <li class={{adminHighlight('sallons')}}>
                <a href="{{route('adminSallons')}}">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>{{__('lang.Join requests')}}
                                    <div class="count">{{App\Models\Sallon::where('is_active',0)->count()}}</div>

                    </span>
                </a>
            </li>
            <li class={{adminHighlight('cities')}}>
                <a href="{{route('adminCities')}}">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>{{__('lang.cities')}}</span>
                </a>
            </li>
            <li class={{adminHighlight('categories')}}>
                <a href="{{route('adminCategories')}}">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>{{__('lang.categories')}}</span>
                </a>
            </li>
            <li class={{adminHighlight('services')}}>
                <a href="{{route('adminServices')}}">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>{{__('lang.services')}}</span>
                </a>
            </li>
          <li class={{adminHighlight('users')}}>
            <a href="{{route('adminUsers')}}">
              <i class="fa-solid fa-users"></i>
              <span>{{__('lang.Users')}}</span>
            </a>
          </li>
{{--          <li class={{adminHighlight('copouns')}}>--}}
{{--            <a href="{{route('adminCopouns')}}">--}}
{{--              <i class="fa-solid fa-gift"></i>--}}
{{--              <span>Copouns</span>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class={{adminHighlight('')}}>--}}
{{--            <a href="Guides.html">--}}
{{--              <i class="fa-solid fa-clapperboard"></i>--}}
{{--              <span>Guides</span>--}}
{{--            </a>--}}
{{--          </li>--}}
          <li class={{adminHighlight('adminSettings')}}>
            <a href="{{route('adminSettings')}}">
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
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/add_copon.js')}}"></script>
    <script src="{{asset('assets/js/personal_image.js')}}"></script>
    <script src="{{asset('assets/js/drop_zone.js')}}"></script>
    <script src="{{asset('assets/js/alert.js')}}"></script>




  </body>
</html>
