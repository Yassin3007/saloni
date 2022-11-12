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
          <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo" /></a>
        </div>
        <div>
          <a href="#" class="log-out">Log Out</a>
          <div class="alerts">
            <i class="fa-solid fa-bell"></i>
            <ul>
              <li>item</li>
              <li>item</li>
              <li>item</li>
              <li>item</li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- End navbar -->

    <main>


      <!-- start content -->
      <div class="content">
          <div class="content setting">


          <h3>Services Prices:</h3>

          <form action="" class="global-form">
              @foreach($sallon->services as $service)
              <div>
                  <div>
                      <label for="f_name">{{$service->name}}: </label>
                      <input type="text" id="f_name" name="f_name" />
                  </div>

              </div>
              @endforeach



              <div class="btns">
                  <button type="submit" class="btn">Apply Copon</button>
                  <button type="reset" class="btn">Reset</button>
              </div>
          </form>


      </div>
      </div>
      <!-- end content -->
    </main>

    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/add_copon.js')}}"></script>
    <script src="{{asset('assets/js/accordion.js')}}"></script>
  </body>
</html>
