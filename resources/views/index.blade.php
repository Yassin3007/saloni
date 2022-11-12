@extends('layouts.front')

@section('content')
    @include('alerts.success')
    @include('alerts.errors')



    <!-- Start Landing -->
    <div class="landing">
        <div class="container">
            <h1>{{__('lang.احجز موعدك مع صالونك دون الحاجة الي التنقل من مكانك')}}</h1>
            <form action="{{route('search')}}" class="landing-form" method="get">
                @csrf
                <div>
                    <select name="service_id">
                        <option value="1" disabled selected hidden>{{__('lang.اختر الخدمة')}}</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                    <select name="city_id">
                        <option value="1" disabled selected hidden>{{__('lang.اختر المدينة')}}</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>

                        @endforeach
                    </select>


                </div>
                <button type="submit">{{__('lang.بحث')}}</button>
            </form>
        </div>
    </div>
    <!-- End Landing -->

    <!-- Start Deal -->
    <div class="deal">
        <h2>{{__('lang.كيف اتعامل مع المنصة؟')}}</h2>
        <div class="container">
            <div class="box">
                <div class="image">
                    <img src="assets/images/ICONE 1.png" alt="img"/>
                </div>
                <div class="description" custom-data="{{__('lang.انشاء حساب')}}">
                    {{__('lang.في غضون دقائق قليلة مباشرة علي موقعنا')}}
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="assets/images/ICONE 3.png" alt="img"/>
                </div>
                <div class="description" custom-data="{{__('lang.احسب موعدك')}}">
                    {{__('lang.حسب الخدمة والمدينة التي تريد')}}
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/images/ICONE 2.png" alt="img"/>
                </div>
                <div class="description" custom-data="{{__('lang.تاكيد الحجز')}}">
                    {{__('lang.تاكيد الحجز بالحضور في الموعد المحدد')}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Deal -->


    <!-- start slider -->
    <section class="slider">
        <div class="container">
            <h2>{{__('lang.الصالونات الاعلي تقييما')}}</h2>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($sallons as $sallon)
                        <div class="swiper-slide">

                            <div class="image">
                                <img src="{{$sallon->image}}" alt="img"/>
                            </div>
                            <div class="head"><h3>{{$sallon->name}}</h3></div>
                            <div class="rate">
                                @for($x = 0 ; $x < $sallon->rating ;$x++)
                                    <div class="star"></div>
                                @endfor
                            </div>
                            <a href="{{route('sallon_profile',$sallon->id)}}">Details</a>
                        </div>
                    @endforeach

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- end slider -->

    <!-- start contact us -->
    <div class="contact-us">
        <div class="container">
            <div class="box">
                <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="logo"/>
            </div>
            <div class="box">
                <h3>{{__('lang.تواصل معنا')}}</h3>
                <div class="social">
                    <a href="https://www.facebook.com/saloni.officiel/" title="facebook">
                        <img src="{{asset('assets/images/icon facebook.png')}}" alt="facebook"/>
                    </a>
                    <a href="https://www.instagram.com/saloni.officiel/" title="instagram">
                        <img src="{{asset('assets/images/icon instagram.png')}}" alt="instagram"/>
                    </a>
                    <a href="https://www.linkedin.com/company/saloni-ma" title="linkdin">
                        <img src="{{asset('assets/images/icon linkdin.png')}}" alt="linkdin"/>
                    </a>
                    <a href="https://www.tiktok.com/@saloni.officiel" title="tiktok">
                        <img src="{{asset('assets/images/icon tiktok.png')}}" alt="tiktok"/>
                    </a>
                </div>
                <div class="email">support@saloni.ma</div>
                <div class="help">{{__('lang.بحاجة الي مساعدة؟')}}</div>
            </div>
            <div class="box">
                <h3>{{__('lang.حول')}} saloni.ma :</h3>
                <div><a href="{{route('about')}}">{{__('lang.من نحن')}}</a></div>
                <div><a href="{{route('privacy')}}">{{__('lang.سياسة الخصوصية')}}</a></div>

            </div>
        </div>
    </div>
    <!-- end contact us -->

    <!-- start footer -->
    <footer>كل الحقوق محفوظة Saloni.ma 2023 &copy;</footer>
    <!-- end footer -->

@endsection
