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
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <!-- start accordion -->
          <form action="{{route('selectServices')}}" method="post">
              @csrf
              <div class="accordion">
                  <div class="title">Services & Departments</div>
                  @foreach($categories as $category)
                      <div class="item">
                          <div class="head">
                              <h3>{{$category->name}}</h3>
                              <div class="icon">
                                  <i class="fa-solid fa-angle-down"></i>
                              </div>
                          </div>
                          <div class="cont">
                              <!-- start services -->
                              <div class="salon-details">
                                  <div class="services">
                                      @foreach($category->services as $servcie)
                                          <div class="serve">
                                              <div class="name">{{$servcie->name}}</div>
                                              <div class="price">
                                                  <label for="price_1">price</label>
                                                  <input type="text" @error($servcie->name) is-invalid @enderror" name="{{str_replace(' ' ,'',$servcie->name)}}" id="price_1" />
                                                  @error($servcie->name)
                                                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                  @enderror
                                                  <input type="checkbox" value="{{$servcie->id}}" name="service[]" id="price_1" />
                                              </div>
                                          </div>
                                      @endforeach




                                  </div>
                              </div>
                              <!-- end services -->
                          </div>
                      </div>
                  @endforeach

              </div>
              <!-- end accordion -->
              <button type="submit" class="btn">Apply Copon</button>
          </form>
          <!-- end accordion -->


      </div>
      <!-- end content -->
    </main>

    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/add_copon.js')}}"></script>
    <script src="{{asset('assets/js/accordion.js')}}"></script>
  </body>
</html>
