@extends('layouts.front')
@section('content')
    <!-- start details -->
    <div class="salon-details">
        @include('alerts.success')
        @include('alerts.errors')


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      <div class="container">
        <div class="details">
            <div class="image">
                @if(count($photos)>0 )
                    @foreach($photos as $photo)
                        <img src="{{asset('storage/uploads/sallons/'.$photo->image)}}" alt="img" />
                    @endforeach

                @else
                    <img src="{{asset('assets/images/image.jpg')}}" alt="img" />

                @endif
                <div class="right"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="left"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="bullets"></div>
            </div>
          <div class="content">
            <div>
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
            </div>

              <p>
                  {{$sallon->description}}
              </p>

            <div class="work-time">
              <div class="head">{{__('lang.مواعيد العمل')}}</div>
              <div class="time">From {{$sallon->open_at}} to {{$sallon->close_at}}</div>
            </div>
          </div>
        </div>

          <!-- start accordion -->
          <div class="accordion">
              <div class="title">{{__('lang.Services & Departments')}}</div>
              <form action="{{route('add_reservation')}}" method="get">
                  @csrf
                  <input hidden name="id" value="{{$sallon->id}}">
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
                              @foreach($services->where('category_id',$category->id) as $service)

                                  <div class="serve">
                                      <div class="name">{{$service->name}}</div>
                                      <div class="price">
                                          <label for="price_1">{{$service->sal_ser->where('sallon_id',$sallon->id)->first()->price}}</label>
                                          <input type="checkbox" name="service[]" value="{{$service->id}}" id="price_1" />
                                      </div>
                                  </div>
                              @endforeach



                          </div>
                      </div>
                      <!-- end services -->
                  </div>
              </div>

              @endforeach

                  <div class="btns">
                      <button type="submit" class="btn">{{__('lang.reserve')}}</button>
                  </div>

              </form>

          </div>
          <!-- end accordion -->

      </div>

    </div>

    <!-- end details -->

    <!-- start comments -->
    <div class="comments">
      <div class="container">
        <div class="sub-title">{{__('lang.Comments')}}</div>
        <div class="info">

            @foreach($comments as $comment)
          <!-- start commtnt -->
          <div class="comment">
            <div class="image">
              <img src="{{\App\Models\User::where('name',$comment->comment_writer)->first()->photo}}" alt="img" />
            </div>
            <div class="description">
              <div class="name">{{$comment->comment_writer}}</div>
                <div class="rate">
                @for($i=0;$i<$comment->rate;$i++)

                <div class="star"></div>

                @endfor
                </div>
              <div class="text">
                  {{$comment->comment}}
              </div>
            </div>
          </div>
          <!-- end comment -->
            @endforeach


        </div>
      </div>
    </div>
    <!-- end comments -->

@if(auth()->check())
    @if(auth()->user()->write==1 )


    <!-- start add comment -->
    <div class="add-comment">
      <div class="container">
        <div class="sub-title">{{__('lang.Add Comment')}}</div>
        <div class="info">
          <form action="{{route('add_comment')}}" method="post">
              @csrf

            <div class="rate">
              <span>{{__('lang.Your Rate')}}: </span>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
              <div class="star"></div>
            </div>
              <textarea name="comment" placeholder="{{__('lang.Add Your Comment Here')}}"></textarea>
            <button type="submit" class="btn">Add</button>
            <input type="text" name="rate" class="stars-count" hidden />
            <input type="text" name="sallon_id" class="stars-count" value="{{$sallon->id}}" hidden />
          </form>
        </div>
      </div>
    </div>
    <!-- end add comment -->
@endif
@endif
@endsection
@section('script')
    <script>
        function myFunction() {
            var Amount_Commission = parseInt(document.getElementById("price_1").value);


                document.getElementById("total").value = Amount_Commission;
               // document.getElementById("Total").value = sumt;

        }
    </script>

@endsection
