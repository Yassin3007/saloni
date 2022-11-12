@extends('layouts.front')
@section('content')
    <!-- start details -->
    @foreach($sallons as $sallon)

    <div class="salon-details">
      <div class="container">
        <div class="details">
            <div class="image">
                @if(count($sallon->images)>0 )
                    @foreach($sallon->images as $photo)
                        <img src="{{asset('storage/uploads/sallons/'.$photo->image)}}" alt="img" />
                    @endforeach

                @else
                    <img src="{{asset('assets/images/image.jpg')}}" alt="img" />

                @endif
                <div class="right"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="left"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="bullets"></div>
            </div>
            <a href="{{route('sallon_profile',$sallon->id)}}">
          <div class="content">

              <div class="name">{{$sallon->name}}</div>



              <div class="rate">
                  @for($i = 0 ;$i<$sallon->rating ;$i++)
                      <div class="star"></div>
                  @endfor
              </div>

              <div class="location">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <g fill="#440e4c">
                    <path
                      d="M12 1C7.6 1 4 4.6 4 9s8 14 8 14 8-9.6 8-14-3.6-8-8-8zm0 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"
                    ></path>
                  </g>
                </svg>
                  <span>{{$sallon->address}}</span>

              </div>
                <p>
                    {{$sallon->description}}
                </p>



            <div class="work-time">
              <div class="head">{{__('lang.مواعيد العمل')}}</div>
              <div class="time">From 10:00 to 08:30</div>
            </div>
          </div>
            </a>
        </div>
          <input hidden value="{{$p = $price->where('sallon_id',$sallon->id)->first()}}">

        <div class="services">
          <div class="info">
            <form action="">
              <div class="serve">
                <div class="name">{{$service->name}}</div>
                <div class="price">
                  <label for="price_1"> {{$p->price}} $  </label>

                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- end details -->

    @endforeach




@endsection
